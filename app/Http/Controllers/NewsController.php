<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news = News::with('comments')
            ->orderBy('date', 'desc')
            ->get();

        $url = Storage::url('storage/image/news/origin/1.jpg');

        return view('main', [
            'image' => $url,
            'data' => $news->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('news.create');
        $new = new News();
        return view('news.create', ['data' => $new->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now();
        $post = News::create([
            'title' => $request->title,
            'text' => $request->text,
            'image' => $request->image,
            'date' => $date,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
            $post->save();
        }

        return redirect()->route('index');
        // $data = $request->all();

        // $filename = $data['image']->getClientOriginalName();

        // //Сохраняем оригинальную картинку
        // $data['image']->move(Storage::path('/public/image/news/') . 'origin/', $filename);

        // //Создаем миниатюру изображения и сохраняем ее
        // $thumbnail = Image::make(Storage::path('/public/image/news/') . 'origin/' . $filename);
        // $thumbnail->fit(300, 300);
        // $thumbnail->save(Storage::path('/public/image/news/') . 'thumbnail/' . $filename);

        // //Сохраняем новость в БД
        // $data['image'] = $filename;
        // News::create($data);

        // return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        $comment = News::find($id)->with('comments');
        return view('post', [
            'data' => $news->find($id),
            'user' => $comment->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $id)
    {
        $item = News::find($id);

        return view('update-news', ['data' => $item->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ref, $id)
    {
        $newNews = News::find($id);
        $newNews->title = $ref->input('title');
        $newNews->text = $ref->input('text');
        $newNews->desc = $ref->input('desc');

        $newNews->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return response()->json(null, 204);
    }
}
