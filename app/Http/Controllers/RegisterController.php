<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use id;
use App\Models\Register;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateRegisterRequest;

class RegisterController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //return view('Register.index');  //輸入 http://localhost:8000/reg/ 會看到 index.blade.php 頁面的內容

    //$Registers = Register::latest()->get();
    $Registers = Register::orderBy('id', 'desc')->get();

    $Registers = Register::orderBy('id', 'desc')->paginate(3); //要加這行頁面才會畫出頁碼

    return view('Register.index', [
      'Registers' => $Registers,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('Register.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreRegisterRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreRegisterRequest $request)
  {
    /*先確認表單資料是否能正確送到前端*/
    //方式一：
    //return $request->input();

    //方式二：
    // $input = $request->all();
    // dd($input);

    //前面key區塊的名稱為表單名
    $request->validate([
      'user_name' => 'required',
      'user_email' => 'required|email',
      'user_tel' => 'required',
      'user_sex' => 'required',
      'aboutme' => 'required',
      'landmark' => 'required|not_in:0',
      'dislikefood' => 'required_without_all|max:3|min:1',
    ]);



    //另種將錯誤訊息以json方式回傳的寫法
    // $rules = [
    //   'user_name' => 'required',
    //   'user_email' => 'required|email',
    //   'user_tel' => 'required',
    //   'user_sex' => 'required',
    //   'aboutme' => 'required',
    //   'landmark' => 'required|not_in:0',
    //   'dislikefood' => 'required_without_all|max:3|min:1',
    // ];

    // $validator = Validator::make($request->all(), $rules);
    //    //要有$messages容才能解除此行註解
    //    // $validator = Validator::make($request->all(), $rules, $messages);
    // if ($validator->fails()) {
    //   $error = $validator->errors()->all();
    //   return response()->json(['status' => false, 'error' => $error], 400);
    // }



    $Register = new Register();

    $Register->name = request('user_name');
    $Register->email = request('user_email');
    $Register->tel = request('user_tel');
    $Register->sex = request('user_sex');
    $Register->aboutme = request('aboutme');
    $Register->landmark = request('landmark');
    $Register->dislikefood = json_encode(request('dislikefood'), JSON_UNESCAPED_UNICODE);

    $Register->save();  //存DB


    //return redirect('/reg')->with('mssg', '感謝填寫!');
    return redirect('/reg')->with('success', '新增資料成功'); //bootstrap alert




  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Register  $register
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $Register = Register::findOrFail($id);
    return view('Register.show', [
      'Register' => $Register,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Register  $register
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $Register = Register::findOrFail($id);
    return view('Register.edit', compact(['Register']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateRegisterRequest  $request
   * @param  \App\Models\Register  $register
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateRegisterRequest $request, $id)
  {

    $request->validate([
      'user_name' => 'required',
      'user_email' => 'required|email',
      'user_tel' => 'required',
      'user_sex' => 'required',
      'aboutme' => 'required',
      'landmark' => 'required|not_in:0',
      'dislikefood' => 'required_without_all|max:3|min:1',
    ]);


    $Register = Register::findOrFail($id);
    $Register->update(
      [
        'name' => request('user_name'),
        'email' => request('user_email'),
        'tel' => request('user_tel'),
        'sex' => request('user_sex'),
        'aboutme' => request('aboutme'),
        'landmark' => request('landmark'),
        'dislikefood' => json_encode(request('dislikefood'), JSON_UNESCAPED_UNICODE)
      ]
    );
    return redirect('/reg')->with('success', '更新資料成功');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Register  $register
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $Register = Register::findOrFail($id);
    $Register->delete();
    return redirect('/reg')->with('success', '刪除資料成功');;
  }

  public function search(Request $request)
  {
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $Registers = Register::query()
      ->where('dislikefood', 'LIKE', "%{$search}%")
      ->orWhere('name', 'LIKE', "%{$search}%")->orderBy('id', 'desc')
      ->get();

    // Return the search view with the resluts compacted
    return view('Register.searchResult', compact('Registers'));
  }
}