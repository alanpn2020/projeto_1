<?php

namespace App\Http\Controllers\Banners;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Banners;
use Illuminate\Support\Facades\DB;
use \Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;




class BannersController extends Controller
{

    public function index()
    {

        $bd_users =  Users::where('id', auth()->user()->id)->first();

        return view('banners.vw-banner', []);
    }

    public function datatable_banners()
    {

        $bd_users =  Users::where('id', auth()->user()->id)->first();

        $db_banners = DB::table('banners')->get();

        return Datatables::of($db_banners)
        ->addColumn('img', function ($db_banners) {

            return '<img src="' . Storage::url($db_banners->url_img) . '" alt="Imagem Banner" style="width:100%;height:100%">';

        })
            ->addColumn('action', function ($db_banners) {
                $btn_edit_sede = '<button class="bttn-material-flat bttn-xs bttn-success btn-editar-banners" data-target="' . $db_banners->id . '"> EDITAR</button>';
                $btn_remover_adm = '<button class="bttn-material-flat bttn-xs bttn-danger btn-excluir-banners" data-target="' . $db_banners->id . '"> EXCLUIR</button>';
                return  $btn_edit_sede . " " . $btn_remover_adm;
            })
            ->rawColumns(['action', 'img'])
            ->toJson();
    }




    public function editar()
    {
        $banner = Banners::find(request()->id);
    
        if (!$banner) {
            return response()->json([
                'response' => false,
                'message' => 'Banner não encontrado.',
            ], 404);  
        }
    
        if (request()->hasFile('arquivos')) {
            $file = request()->file('arquivos'); 
            $extensoesValidas = ['jpeg', 'jpg', 'png', 'webp'];
            $extensao = $file->getClientOriginalExtension();
    
            if (!in_array(strtolower($extensao), $extensoesValidas)) {
                return response()->json([
                    'mensagem' => false,
                    'message' => 'A extensão do arquivo é inválida. Apenas imagens JPEG, WEBP, ou PNG são permitidas.',
                ]);
            }
    
       
            if ($banner->url_img) {
                Storage::disk('public')->delete($banner->url_img);
            }
    
  
            $filePath = $file->store('banners', 'public');  // Salva a imagem no diretório 'banners'
            $fileName = $file->getClientOriginalName();     // Nome original do arquivo
    

            $banner->url_img = $filePath;
            $banner->nome_img = $fileName;
        }
    
        // Salva as alterações no banco de dados
        $banner->save();
    
        // Resposta de sucesso
        return response()->json([
            'response' => true,
            'message' => 'Banner atualizado com sucesso!',
        ]);
    }
    

    public function adicionar()
    {

        $arquivos = request()->file('arquivos');

        $extensoesValidas = ['jpeg', 'jpg', 'png', 'webp'];

        foreach ($arquivos as $file) {
            $extensao = $file->getClientOriginalExtension();
            
            if (!in_array(strtolower($extensao), $extensoesValidas)) {
                return response()->json([
                    'mensagem' => false,
                    'message' => 'Um ou mais arquivos têm uma extensão inválida. Apenas imagens JPEG, WEBP, ou PNG são permitidas.',
                ]);  
            }
        }

        
        $fileData = [];

        if (request()->hasFile('arquivos')) {

            foreach (request()->file('arquivos') as $file) {
                $filePath = $file->store('banners', 'public');
                $fileName = $file->getClientOriginalName(); 

                $banners = new Banners();
                $banners->url_img = $filePath;
                $banners->nome_img = $fileName;

                $banners->save();
            }


            return response()->json([
                'response' => true,
                'message' => 'Banner adicionado com sucesso!',
            ]);
        }
    }

    public function excluir()
    {

        $banner = Banners::find(request()->id);

        if (!$banner) {
            return response()->json([
                'response' => false,
                'message' => 'Banner não encontrado.',
            ], 404);
        }
    
        if ($banner->url_img) {
            Storage::disk('public')->delete($banner->url_img);
        }
    
        $banner->delete();
    
        return response()->json([
            'response' => true,
            'message' => 'Banner excluído com sucesso!',
        ]);

    }
}
