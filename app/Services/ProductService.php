<?php

namespace App\Services;

use App\Classes\UserRegisterRequest\LinkUserRegisterRequestClass;
use App\Libraries\ApiSendgrid;
use App\Libraries\Facilites;
use App\Libraries\GuzzleRequests;
use App\Models\PartnersOrUsersRegister;
use App\Models\Product;
use App\Models\RegisterRequest;
use App\Models\User;
use App\Models\UsersRegisterRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService
{


    public function createProdutc($request)
    {
        try {

            $product_new = Product::create([
                'uuid' => Str::uuid(),
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'price' => $request->price,
                'stock_quantity' => $request->stock_quantity,
                'brand' => $request->brand,
                'created_at' => Carbon::now(), // Adiciona a data e hora atual
            ]);
    
            return [
                "success" => true,
                "message" => "Produto criado com sucesso.",
                "data" => $product_new,
                "status_code" => 201
            ];
        } catch (Exception $e) {
            log::error('Error', [
                "message" => $e->getMessage(),
                "file" => $e->getFile(),
                "line" => $e->getLine()
            ]);

            return [
                'message' => 'Error',
                'data' => null,
                'status_code' => 500,
                'error' => [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ]
            ];
        }
    }

    public function deleteProduct($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
    
            return [
                "success" => true,
                "message" => "Produto deletado com sucesso.",
                "data" => null,
                "status_code" => 200
            ];
        } catch (Exception $e) {
            Log::error('Error', [
                "message" => $e->getMessage(),
                "file" => $e->getFile(),
                "line" => $e->getLine()
            ]);

            return [
                'success' => false,
                'message' => 'Erro ao deletar o produto.',
                'data' => null,
                'status_code' => 500,
                'error' => [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ]
            ];
        }
    }


    public function updateProduct($id, $data)
    {
        try {
            $product = Product::findOrFail($id);
            $product->update($data->all());
    
            return [
                "success" => true,
                "message" => "Produto atualizado com sucesso.",
                "data" => $product,
                "status_code" => 200
            ];
        } catch (Exception $e) {
            Log::error('Error', [
                "message" => $e->getMessage(),
                "file" => $e->getFile(),
                "line" => $e->getLine()
            ]);

            return [
                'success' => false,
                'message' => 'Erro ao atualizar o produto.',
                'data' => null,
                'status_code' => 500,
                'error' => [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ]
            ];
        }
    }
}
