<?php namespace App\Http\Controllers;

use App\Colors;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Image;
use Validator;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminColorsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if (view()->exists('admin.colors')) {
            $colors = Colors::all();
            $data = [
                'title' => 'Варианты расцветок',
                'colors' => $colors
            ];
            return view('admin.colors', $data);
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        $colors = Colors::all();
$colors->toArray($colors);


        $data = [
            'title' => 'Добавить новую расцветку',
            'colors' => $colors
        ];
        return view('admin.add_colors',$data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if($request->isMethod('post')){
            $input = $request->except('_token');

            $validator = Validator::make($input, [
                'color' => 'required|max:255',
                'price' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->route('admin.colors.store')->withErrors($validator);
            }
            $input['color'] = htmlentities($input['color']);

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $count = Carbon::now()->timestamp;
                if ($image->isValid()) {
                    //file name
                    $str = $count.'_colors_autopilot.jpg';
                    $img = Image::make($image);
                    $img->fit(450, 450)->save(public_path() . '/assets/images/colors/' . $str);
                    $input['img'] = $img->basename;
                    $img->fit(380, 380)->save(public_path() . '/assets/images/colors/thumbs/' . $str);
                }
            }
            $colorsAdd = new Colors();
            $colorsAdd->fill($input);
            //dd($colorsAdd);
            if ($colorsAdd->save()) {
                Session::flash('status', 'Информация добавлена');
                return redirect('admin/colors');
            }
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        if(view()->exists('admin.add_colors')){

            $colors = Colors::find($id);
            $arr = $colors->toArray();


            $data = [
                'title' =>'Вариант расцветки '.$arr['color'],
                'colors'=>$colors
            ];
        }
        return view('admin.add_colors', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $colors = Covers::find($id);
        $colors->toArray();

        $data = [
            'title'=>'Редактирование расцветки '.$colors['color'],
            'colors'=>$colors,
        ];

        return view('admin.add_colors', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        if($request->isMethod('put')){
            $input = $request->except('_token','_method');
            //dd($input);

            $validator = Validator::make($input, [
                'color' => 'required|max:255',
                'price' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->route('admin.colors.store')->withErrors($validator);
            }
            $input['color'] = htmlentities($input['color']);

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $count = Carbon::now()->timestamp;
                if ($image->isValid()) {
                    //file name
                    $str = $count.'_colors_autopilot.jpg';
                    $img = Image::make($image);
                    $img->fit(450, 450)->save(public_path() . '/assets/images/colors/' . $str);
                    $input['img'] = $img->basename;
                    $img->fit(380, 380)->save(public_path() . '/assets/images/colors/thumbs/' . $str);
                }
            }
            else {
                $input['img'] = $input['old_image'];
            }
            $input = array_except($input, ['old_image']);
            $colorsAdd = new Colors();
            //dd($input);
            $colorsAdd->fill($input);
            //dd($colorsAdd);
            $result = $colorsAdd->where('id',$id)->update($input);
            //dd($result);
            if ($result) {
                Session::flash('status', 'Информация обновлена');
                return redirect('admin/colors');
            }
        }
    }
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$result = Colors::where('id',$id)->delete();
		if($result){
            return redirect('admin/colors')->with('status', 'Удалено');
        }
	}

}
