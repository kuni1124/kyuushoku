<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dai;
use App\Tyuu;
use App\Shou;
use App\Shushoku;
use App\Fukushoku;
use App\Sirumono;
class DaisController extends Controller
{
    public function index()
    {
        $randams = Dai::all();
        $randams2 = Tyuu::all();
        $randams3 = Shou::all();
        $kakakus = [];
       
        for ($i=0;$i<31;$i++){
           
            $genka = isset($randams[$i]) ? $randams[$i]->genka : 0;
            
            $genka2 = isset($randams2[$i]) ? $randams2[$i]->genka : 0;
            $genka3 = isset($randams3[$i]) ? $randams3[$i]->genka : 0;
            $kakaku = $genka + $genka2 + $genka3;
            $kakakus[$i] = $kakaku;
            
        }
        return view('dai.index', [
            'randams' => $randams,
            'randams2' => $randams2,
            'randams3' => $randams3,
            'kakakus' => $kakakus,
            
        ]);
    }

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
         $shushokushikui = Shushoku::where('display', true)->where('bunrui' , '1')->where('kakaku' , '1')->get();
         $shushokushikui = $shushokushikui->shuffle();
         $shushokustakai = Shushoku::where('display', true)->where('bunrui' , '1')->where('kakaku' , '2')->get();
         $shushokustakai = $shushokustakai->shuffle();
         $count = 0; 

        //  for ($i=0;$i<31;$i++){
        //     $shushoku = null;
        //     $div = intdiv($i,2);
        //     if($i % 2 == 0 ){
        //         if(isset($shushokushikui[$div])){
        //             $shushoku = $shushokushikui[$div];
        //         }
               
        //     }else{
        //         if(isset($shushokustakai[$div])){
        //             $shushoku = $shushokustakai[$div];
        //         }
        //     }
        //     if(isset($shushoku)){
        //     $randam = new Dai;
        //     $randam->bunrui = $shushoku->bunrui;
        //     $randam->kakaku = $shushoku->kakaku;
        //     $randam->name = $shushoku->name;
        //     $randam->genka = $shushoku->genka;
        //     $randam->save();
        //     $count += 1;
        //     }
            
        // }
        
        
       
        // for ($i=0;$i<31-$count;$i++)  {
        //     if(isset($shushoskushikui)){
        //         $shushokus = $shushokushikui[$i];
        //         dd($shushokus); 
        //     }if(isset($shushoskustakai)){
        //         $shushokus = $shushokustakai[$i];
        //         dd($shushokus);
        //         }
        //     else{
        //     $randam = new Dai;
        //     $randam->bunrui = null;
        //     $randam->kakaku = null;
        //     $randam->name = null;
        //     $randam->genka = null;
        //     $randam->save();}
        // }
            for ($i=0;$i<31;$i++){
                $shushoku = null;
                $div = intdiv($i,2);
                if($i % 2 == 0 ){
                    if(isset($shushokushikui[$div])){
                        $shushoku = $shushokushikui[$div];
                    }
                   
                }else{
                    if(isset($shushokustakai[$div])){
                        $shushoku = $shushokustakai[$div];
                    }
                }
                if(isset($shushoku)){
                $randam = new Dai;
                $randam->bunrui = $shushoku->bunrui;
                $randam->kakaku = $shushoku->kakaku;
                $randam->name = $shushoku->name;
                $randam->genka = $shushoku->genka;
                $randam->save();
                $count += 1;
                }
               
                
            }
            for ($i=0;$i<31-$count;$i++)  {
                $randam = new Dai;
                $randam->bunrui = null;
                $randam->kakaku = null;
                $randam->name = null;
                $randam->genka = null;
                $randam->save();
            }
         $fukushokushikui = Fukushoku::where('display', true)->where('bunrui' , '1')->where('kakaku' , '1')->get();
         $fukushokushikui = $fukushokushikui->shuffle();
         $fukushokustakai = Fukushoku::where('display', true)->where('bunrui' , '1')->where('kakaku' , '2')->get();
         $fukushokustakai = $fukushokustakai->shuffle();
         $count = 0;

         for ($i=0;$i<31;$i++){
                $fukushoku = null;
                $div = intdiv($i,2);
                if($i % 2 == 0 ){
                    if(isset($fukushokustakai[$div])){
                        $fukushoku = $fukushokustakai[$div];
                    }
                   
                }else{
                    if(isset($fukushokushikui[$div])){
                        $fukushoku = $fukushokushikui[$div];
                    }
                }
                if(isset($fukushoku)){
                $randam2 = new Tyuu;
                $randam2->bunrui = $fukushoku->bunrui;
                $randam2->kakaku = $fukushoku->kakaku;
                $randam2->name = $fukushoku->name;
                $randam2->genka = $fukushoku->genka;
                $randam2->save();
                $count += 1;
                }}

                for ($i=0;$i<31-$count;$i++)  {
                    $randam2 = new Tyuu;
                    $randam2->bunrui = null;
                    $randam2->kakaku = null;
                    $randam2->name = null;
                    $randam2->genka = null;
                    $randam2->save();
                }
         $sirumonoshikui = Sirumono::where('display', true)->where('bunrui' , '1')->where('kakaku' , '1')->get();
         $sirumonoshikui = $sirumonoshikui->shuffle();
        
         $sirumonostakai = Sirumono::where('display', true)->where('bunrui' , '1')->where('kakaku' , '2')->get();
         $sirumonostakai = $sirumonostakai->shuffle();
        
         $count = 0;

         for ($i=0;$i<31;$i++){
            $sirumono = null;
            $div = intdiv($i,2);
            if($i % 2 == 0 ){
                if(isset($sirumonostakai[$div])){
                    $sirumono = $sirumonostakai[$div];
                }
               
            }else{
                if(isset($sirumonoshikui[$div])){
                    $sirumono = $sirumonoshikui[$div];
                }
            }
            if(isset($sirumono)){
            $randam3 = new Shou;
            $randam3->bunrui = $sirumono->bunrui;
            $randam3->kakaku = $sirumono->kakaku;
            $randam3->name = $sirumono->name;
            $randam3->genka = $sirumono->genka;
            $randam3->save();
            $count += 1;
            }}

            for ($i=0;$i<31-$count;$i++)  {
                $randam3 = new Shou;
                $randam3->bunrui = null;
                $randam3->kakaku = null;
                $randam3->name = null;
                $randam3->genka = null;
                $randam3->save();
            }
         return redirect('/randam-index')->with('flash_message', 'DELETE!');
       
        }

    public function create2()
    {
        $shushokushikui = Shushoku::where('display', true)->where('bunrui' , '2')->where('kakaku' , '1')->get();
        $shushokushikui = $shushokushikui->shuffle();
        $shushokustakai = Shushoku::where('display', true)->where('bunrui' , '2')->where('kakaku' , '2')->get();
        $shushokustakai = $shushokustakai->shuffle();
        $count = 0; 

        for ($i=0;$i<31;$i++){
            $shushoku = null;
            $div = intdiv($i,2);
            if($i % 2 == 0 ){
                if(isset($shushokushikui[$div])){
                    $shushoku = $shushokushikui[$div];
                }
               
            }else{
                if(isset($shushokustakai[$div])){
                    $shushoku = $shushokustakai[$div];
                }
            }
            if(isset($shushoku)){
            $randam = new Dai;
            $randam->bunrui = $shushoku->bunrui;
            $randam->kakaku = $shushoku->kakaku;
            $randam->name = $shushoku->name;
            $randam->genka = $shushoku->genka;
            $randam->save();
            $count += 1;
            }
           
            
        }
        for ($i=0;$i<31-$count;$i++)  {
            $randam = new Dai;
            $randam->bunrui = null;
            $randam->kakaku = null;
            $randam->name = null;
            $randam->genka = null;
            $randam->save();
        }
     $fukushokushikui = Fukushoku::where('display', true)->where('bunrui' , '2')->where('kakaku' , '1')->get();
     $fukushokushikui = $fukushokushikui->shuffle();
     $fukushokustakai = Fukushoku::where('display', true)->where('bunrui' , '2')->where('kakaku' , '2')->get();
     $fukushokustakai = $fukushokustakai->shuffle();
     $count = 0;

     for ($i=0;$i<31;$i++){
            $fukushoku = null;
            $div = intdiv($i,2);
            if($i % 2 == 0 ){
                if(isset($fukushokustakai[$div])){
                    $fukushoku = $fukushokustakai[$div];
                }
               
            }else{
                if(isset($fukushokushikui[$div])){
                    $fukushoku = $fukushokushikui[$div];
                }
            }
            if(isset($fukushoku)){
            $randam2 = new Tyuu;
            $randam2->bunrui = $fukushoku->bunrui;
            $randam2->kakaku = $fukushoku->kakaku;
            $randam2->name = $fukushoku->name;
            $randam2->genka = $fukushoku->genka;
            $randam2->save();
            $count += 1;
            }}

            for ($i=0;$i<31-$count;$i++)  {
                $randam2 = new Tyuu;
                $randam2->bunrui = null;
                $randam2->kakaku = null;
                $randam2->name = null;
                $randam2->genka = null;
                $randam2->save();
            }
     $sirumonoshikui = Sirumono::where('display', true)->where('bunrui' , '2')->where('kakaku' , '1')->get();
     $sirumonoshikui = $sirumonoshikui->shuffle();
    
     $sirumonostakai = Sirumono::where('display', true)->where('bunrui' , '2')->where('kakaku' , '2')->get();
     $sirumonostakai = $sirumonostakai->shuffle();
    
     $count = 0;

     for ($i=0;$i<31;$i++){
        $sirumono = null;
        $div = intdiv($i,2);
        if($i % 2 == 0 ){
            if(isset($sirumonostakai[$div])){
                $sirumono = $sirumonostakai[$div];
            }
           
        }else{
            if(isset($sirumonoshikui[$div])){
                $sirumono = $sirumonoshikui[$div];
            }
        }
        if(isset($sirumono)){
        $randam3 = new Shou;
        $randam3->bunrui = $sirumono->bunrui;
        $randam3->kakaku = $sirumono->kakaku;
        $randam3->name = $sirumono->name;
        $randam3->genka = $sirumono->genka;
        $randam3->save();
        $count += 1;
        }}

        for ($i=0;$i<31-$count;$i++)  {
            $randam3 = new Shou;
            $randam3->bunrui = null;
            $randam3->kakaku = null;
            $randam3->name = null;
            $randam3->genka = null;
            $randam3->save();
        }
         return redirect('/randam-index')->with('flash_message', 'DELETE!');
       
    }


    public function edit($id)
    {
        $randam = Dai::findOrFail($id);
        $shushokus = Shushoku::where('display', true)->pluck('name','id');
        
        return view('dai.edit', [
            'randam' => $randam,
            'shushokus' => $shushokus,
            
        ]);
            //
    }
    public function edit2($id)
    {
        $randam2 = Tyuu::findOrFail($id);
        $sukushokus = Fukushoku::where('display', true)->pluck('name','id');
        return view('dai.edittyuu', [
            'randam2' => $randam2,
            'shushokus' => $sukushokus,
            
        ]);
            //
    }
    public function edit3($id)
    {
        $randam3 = Shou::findOrFail($id);
        $sirumonos = Sirumono::where('display', true)->pluck('name','id');
        return view('dai.editshou', [
            'randam3' => $randam3,
            'sirumonos' => $sirumonos,
            
        ]);
            //
    }

    // putまたはpatchでmessages/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        $randam = Dai::findOrFail($id);
        $shushoku = Shushoku::findOrFail($request->shushoku_id);
        $randam->bunrui = $shushoku->bunrui;
        $randam->kakaku = $shushoku->kakaku;
        $randam->name = $shushoku->name;
        $randam->genka = $shushoku->genka;

        $randam->save();
        return redirect('/randam-index')->with('flash_message', 'PUT!');
    }

    public function update2(Request $request, $id)
    {
        $randam2 = Tyuu::findOrFail($id);
        $fukushoku = Fukushoku::findOrFail($request->fukushoku_id);
        $randam2->bunrui = $fukushoku->bunrui;
        $randam2->kakaku = $fukushoku->kakaku;
        $randam2->name = $fukushoku->name;
        
        $randam2->genka = $fukushoku->genka;

        $randam2->save();
        return redirect('/randam-index')->with('flash_message', 'PUT!');
    }


    public function update3(Request $request, $id)
    {
        $randam3 = Shou::findOrFail($id);
        $sirumono = Sirumono::findOrFail($request->sirumono_id);
        $randam3->bunrui = $sirumono->bunrui;
        $randam3->kakaku = $sirumono->kakaku;
        $randam3->name = $sirumono->name;
        
        $randam3->genka = $sirumono->genka;

        $randam3->save();
        return redirect('/randam-index')->with('flash_message', 'PUT!');
    }


    // deleteでmessages/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $randam = Dai::findOrFail($id);
        $randam->bunrui = null;
        $randam->kakaku = null;
        $randam->name = null;
        $randam->genka = null;
        $randam->save();
         return redirect('/randam-index')->with('flash_message', 'DELETE!');
    }

    public function destroy2($id)
    {
        $randam2 = Tyuu::findOrFail($id);
        $randam2->bunrui = null;
        $randam2->kakaku = null;
        $randam2->name = null;
        $randam2->genka = null;
        $randam2->save();
         return redirect('/randam-index')->with('flash_message', 'DELETE!');
    }
    public function destroy3($id)
    {
        $randam3 = Shou::findOrFail($id);
        $randam3->bunrui = null;
        $randam3->kakaku = null;
        $randam3->name = null;
        $randam3->genka = null;
        $randam3->save();
         return redirect('/randam-index')->with('flash_message', 'DELETE!');
    }

    public function destroy4()
    {
        \DB::table('dais')->delete();
        \DB::table('tyuus')->delete();
        \DB::table('shous')->delete();
  
        return redirect('/randam-index')->with('flash_message', 'PUT!');
    }
}
