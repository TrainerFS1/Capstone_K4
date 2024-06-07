<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    
    public function index()
    {
        $packages = Package::all();
        // dd($packages);
        return view('package.index', compact('packages'));  
    }
    
    public function create()
    {
        return view('package.create');  
    }

    public function package()
    {
        $packages = Package::all();

        if ($packages->isEmpty()) {
            \Log::info('Packages data is empty');
        }

        return view('package.index', compact('packages'));
    }
    
    public function store(Request $request)
    {
        // Validate form
        $this->validate($request, [
            'packageName'       => 'required',
            'packageGambar'     => 'required|image|mimes:jpeg,jpg,png',
            'packageDeskripsi'  => 'required|min:10',
            'packagePrice'      => 'required|numeric'
        ]);

        // Upload image
        $gambar = $request->file('packageGambar');
        $gambar->storeAs('public/packages', $gambar->hashName());

        // Create package
        Package::create([
            'packageName'       => $request->packageName,
            'packageGambar'     => $gambar->hashName(),
            'packageDeskripsi'  => $request->packageDeskripsi,
            'packagePrice'      => $request->packagePrice,
        ]);

        // Redirect to index with success message
        return redirect(route('daftarPackage'))->with('success', 'Data Berhasil Diupdate');
    }
    
    public function show(Package $package, $id)
    {
        $package = Package::find($id);
        return view('laundry', compact('package'));
        // return view('laundry')->with('package', $package);
    }

    public function edit(string $id)
    {
        $package = Package::findOrFail($id); 
        return view('package.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        //validasi form
        $this->validate($request, [
            'packageName'       => 'required',
            'packageDeskripsi'  => 'required|min:10',
            'packagePrice'      => 'required|numeric'
        ]);
    
        //untuk mengambil Package berdasarkan ID
        $package = Package::findOrFail($id);
    
        //Cek apabila gambar akan di upload
        if ($request->hasFile('packageGambar')) {
    
            //upload gambar baru
            $gambar = $request->file('packageGambar');
            $gambar->storeAs('public/packages', $gambar->hashName());
    
            //hapus gambar lama
            Storage::delete('public/packages/' . $package->packageGambar);
    
            //update Package dengan gambar baru
            $package->update([
                'packageName'       => $request->packageName,
                'packageGambar'     => $gambar->hashName(),
                'packageDeskripsi'  => $request->packageDeskripsi,
                'packagePrice'      => $request->packagePrice,
            ]);
    
        } else {
    
            //update Package tanpa gambar
            $package->update([
                'packageName'       => $request->packageName,
                'packageDeskripsi'  => $request->packageDeskripsi,
                'packagePrice'      => $request->packagePrice,
            ]);
    
        }
    
        //mengarahkan ke halaman index Package
        return redirect(route('daftarPackage'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.p
     */
    public function destroy(string $id)
    {
        $package = Package::findOrFail($id);
        Storage::delete('public/packages/'. $package->gambar);
        $package->delete();
        return redirect(route('daftarPackage'))->with('success', 'Data berhasil dihapus.');
    }
}