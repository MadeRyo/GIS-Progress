<?php

namespace App\Http\Controllers;
use App\Models\Bioskop;
use Illuminate\Http\Request;

class BioskopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $data = Bioskop::get();
        return view('welcome',[
            'spaces' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'desc' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'photo' => 'image|max:2048'
        ]);

        $data = new Bioskop();

        $data->nama = $request->input('nama');
        $data->jenis = $request->input('jenis');
        $data->alamat = $request->input('alamat');
        $data->telepon = $request->input('telepon');
        $data->desc = $request->input('desc');
        $data->latitude = $request->input('latitude');
        $data->longitude = $request->input('longitude');

        // return dd($data);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $uploadFile = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/imgCover/', $uploadFile);
            $data->photo = $uploadFile;
        }else{
            $data->photo = 'store_profile.jpg';
        }
        
        $data->save();

        if ($data) {
            return redirect('/map');
        } else {
            return redirect('/map');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function edit(Bioskop $bioskop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marker $marker)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marker = Bioskop::find($id);
        $marker->delete();
        return redirect('/map');
    }
}
