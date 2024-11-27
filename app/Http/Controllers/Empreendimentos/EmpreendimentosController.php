<?php

namespace App\Http\Controllers\Empreendimentos;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Empreendimentos;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use \Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;




class EmpreendimentosController extends Controller
{

    public function index()
    {
        $categorias = Categoria::get();

        return view('empreendimentos.vw-empreendimentos', [
            'categorias' => $categorias
        ]);
    }

    public function datatable_empreendimentos()
    {
        $db_empreendimentos = DB::table('empreendimentos')->get();

        return Datatables::of($db_empreendimentos)
        ->addColumn('categoria', function ($db_empreendimentos) {

            $categoria = Categoria::where('id', $db_empreendimentos->id_categoria)->first();

            return '<span style="background-color: #7E1518; color: white; padding: 4px 8px; text-align: center; border-radius: 5px; font-size: 14px;">'. $categoria->nome .'</span>';

        })
        ->addColumn('img', function ($db_empreendimentos) {

            return '<img src="' . Storage::url($db_empreendimentos->url_img) . '" alt="Imagem Banner" style="width:100%;height:100%">';

        })
            ->addColumn('action', function ($db_empreendimentos) {
                $btn_edit_sede = '<button class="bttn-material-flat bttn-xs bttn-success btn-editar-empreendimentos" data-target="' . $db_empreendimentos->id . '"> EDITAR</button>';
                $btn_remover_adm = '<button class="bttn-material-flat bttn-xs bttn-danger btn-excluir-empreendimentos" data-target="' . $db_empreendimentos->id . '"> EXCLUIR</button>';
                return  $btn_edit_sede . " " . $btn_remover_adm;
            })
            ->rawColumns(['action', 'img', 'categoria'])
            ->toJson();
    }


    public function editar()
    {
        $empreendimentos = Empreendimentos::find(request()->id);
    
        if (!$empreendimentos) {
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
    
            if ($empreendimentos->url_img) {
                Storage::disk('public')->delete($empreendimentos->url_img);
            }
    
            $filePath = $file->store('empreendimentos', 'public'); 
            $fileName = $file->getClientOriginalName();    
    
            $empreendimentos->url_img = $filePath;
            $empreendimentos->nome_img = $fileName;        
        }

        $empreendimentos->id_categoria = request()->id_categoria;
        $empreendimentos->titulo = request()->titulo;
        $empreendimentos->localizacao = request()->localizacao;
        $empreendimentos->dormitorio = request()->dormitorio;
        $empreendimentos->url_empreendimento = request()->url_empreendimento;
        $empreendimentos->save();
    
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
                $filePath = $file->store('empreendimentos', 'public');
                $fileName = $file->getClientOriginalName(); 

                $empreendimentos = new Empreendimentos();
                $empreendimentos->url_img = $filePath;
                $empreendimentos->nome_img = $fileName;
                $empreendimentos->id_categoria = request()->id_categoria;
                $empreendimentos->titulo = request()->titulo;
                $empreendimentos->localizacao = request()->localizacao;
                $empreendimentos->dormitorio = request()->dormitorio;
                $empreendimentos->url_empreendimento = request()->url_empreendimento;

                $empreendimentos->save();
            }


            return response()->json([
                'response' => true,
                'message' => 'Banner adicionado com sucesso!',
            ]);
        }
    }

    public function excluir()
    {

        $banner = Empreendimentos::find(request()->id);

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
