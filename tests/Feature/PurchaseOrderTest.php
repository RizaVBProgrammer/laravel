<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PurchaseOrderController;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class PurchaseOrderTest extends TestCase
{
    public function test_upload_purchase_order()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->create('document.pdf');

        $request = new Request([
            'nama_perusahaan' => 'Perusahaan ABC',
            'file' => $file,
        ]);

        $controller = new PurchaseOrderController();

        $controller->store($request);

        $filename = time() . '.' . $file->extension();

        $this->assertDatabaseHas('purchase_orders', [
            'user_id' => $user->id,
            'nama_perusahaan' => 'Perusahaan ABC',
            'file' => $filename,
        ]);

        $path = 'file/' . $filename; // Path relatif ke file dalam direktori public
        $fullPath = public_path($path); // Path lengkap di server

        // Storage::disk('public')->assertExists($path);
        $this->assertFileExists($fullPath);
    }

}
