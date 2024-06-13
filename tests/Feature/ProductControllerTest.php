<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_products()
    {
        $products = Product::factory()->count(3)->create();

        $response = $this->get(route('produtos.index'));

        $response->assertStatus(200);
        foreach ($products as $product) {
            $response->assertSee($product->name);
        }
    }


    /** @test */
    public function it_can_store_new_product()
    {
        $data = [
            'name' => 'Novo Produto',
            'description' => 'Descrição do Novo Produto',
            'type' => 'shampoo',
            'price' => 15.99,
            'stock_quantity' => 50,
            'brand' => 'Nova Marca'
        ];

        $response = $this->post(route('produtos.store'), $data);

        $response->assertRedirect(route('produtos.index')); // Verifica se redireciona para a lista de produtos
        $this->assertDatabaseHas('products', ['name' => 'Novo Produto']); // Verifica se o produto foi inserido no banco de dados
    }



    /** @test */
    public function it_can_show_edit_product_form()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('produtos.edit', $product->id));

        $response->assertStatus(200);
        $response->assertSee($product->name);
    }

    /** @test */
    public function it_can_update_existing_product()
    {
        $product = Product::factory()->create();

        $data = [
            'name' => 'Produto Atualizado',
            'description' => 'Descrição do Produto Atualizado',
            'type' => 'soap',
            'price' => 15.99,
            'stock_quantity' => 50,
            'brand' => 'Nova Marca'
        ];

        $response = $this->put(route('produtos.update', $product->id), $data);

        $response->assertRedirect(route('produtos.index'));
        $this->assertDatabaseHas('products', ['name' => 'Produto Atualizado']);
    }


    /** @test */
    public function it_can_delete_product()
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('produtos.destroy', $product->id));

        $response->assertRedirect(route('produtos.index'));
        $this->assertSoftDeleted($product);
    }
}
