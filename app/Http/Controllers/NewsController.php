<?php

namespace App\Http\Controllers;

use App\NewsData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Routing\Redirector;

class NewsController extends Controller {

    public function index() {
        // $news = DB::select('select * from news_cat');
        return view('content.addcontent');
    }

    public function newsshow() {
        if (isset($_GET['ns']) && $_GET['ns'] != "0" || isset($_GET['keyword'])) {
            if (!isset($_GET['keyword'])) {
                $k = "";
            } else {
                $k = $_GET['keyword'];
            }
            if ($_GET['ns'] != 0) {
                $news = NewsData::SearchByKeyword($k, '')->where('cat', $_GET['ns'])->orderby('orders', 'asc')->orderby('last_date_new', 'asc')->sortable()->paginate(10);
            } else {
                $news = NewsData::SearchByKeyword($k, '')->orderby('orders', 'asc')->orderby('last_date_new', 'asc')->sortable()->paginate(10);
            }
        } else if (isset($_GET['ns']) && $_GET['ns'] == "0") {

            $news = NewsData::SearchByKeyword($_GET['keyword'], '')->orderby('orders', 'asc')->orderby('last_date_new', 'asc')->sortable()->paginate(10);
        } else if (isset($_GET['keyword'])) {
            $news = NewsData::SearchByKeyword($_GET['keyword'], '')->orderby('orders', 'asc')->orderby('last_date_new', 'asc')->sortable()->paginate(10);
        } else {
            $news = NewsData::sortable()->orderby('orders', 'asc')->orderby('last_date_new', 'asc')->paginate(10);
        } return view('content.index', compact('news'));
    }

    public function store(Request $request) {

        try {

            if ($request->hasFile('file')) {
                $filenames = date("ydmhs").'.pdf';
                $filename = $request->file->storeAs('upload', $filenames);
            }
            if ($request->hasFile('img')) {
                $imgname = $request->img->getClientOriginalName();
                /* storeAs = แอดลงโฟล์เดอร์ */
                $imgnames = $request->img->storeAs('uploadimg', $imgname);
            }
            if (!$request->hasFile('img')) {
                $imgname = "";
            }
            if (!$request->hasFile('file')) {
                $filename = $request->input('file');
            }

            DB::table('news')->insert([
                'cat' => $request->input('group'),
                'year' => $request->input('year'),
                'orders' => $request->input('order'),
                'title_th' => $request->input('title_th'),
                'title_en' => $request->input('title_en'),
                'type' => $request->input('type'),
                'file' => $filenames,
                'img' => $imgname,
                'url' => $request->input('url'),
                'record_status' => "N",
                'text_th' => $request->input('text_th'),
                'text_en' => $request->input('text_en'),
                'create_user_new' => $request->input('user'),
                'create_date_new' => $request->input('date'),
                'last_user_new' => $request->input('user'),
                'last_date_new' => $request->input('date'),
            ]);
            return redirect('content?mes=createNewsOK');
        } catch (\Exception $e) {
            return redirect('content?mes=createNewsError');
        }
    }

    public function edit($nid) {
        $newsshow = DB::table('news')->join('news_cat', 'news.cat', '=', 'news_cat.id')->where('nid', '=', $nid)->get();
        return view('content.editcontent', ['newsshow' => $newsshow, 'nid' => $nid]);
    }

    public function update(Request $request) {
        try {

            if ($request->hasFile('file')) {
                $filenames = $request->input('file');
                $filename = $request->file->storeAs('upload', $filenames);
            }
            if ($request->hasFile('img')) {
                $imgname = $request->img->getClientOriginalName();
                /* storeAs = แอดลงโฟล์เดอร์ */
                $imgnames = $request->img->storeAs('uploadimg', $imgname);
            }
            if (!$request->hasFile('img')) {
                $imgname = "";
            }
            if (!$request->hasFile('file')) {
                $filenames = $request->input('file');
            }
            \DB::table('news')
                    ->where('nid', $request->input('nid'))
                    ->update(['cat' => $request->input('group'),
                        'orders' => $order = $request->input('order'),
                        'title_th' => $request->input('title_th'),
                        'title_en' => $request->input('title_en'),
                        'type' => $request->input('type'),
                        'file' => $filenames,
                        'img' => $imgname,
                        'url' => $request->input('url'),
                        'record_status' => "N",
                        'text_th' => $request->input('text_th'),
                        'text_en' => $request->input('text_en'),
                        'last_user_new' => $request->input('create_user'),
                        'last_date_new' => $request->input('create_date')
            ]);
            return redirect('content?mes=fileUpdateOK');
        } catch (\Exception $e) {
            return redirect('content?mes=fileUpdateError');
        }
    }

    public function destroy() {
        try {
            $id = $_GET['nid'];
            $name = $_GET['img'];
            try {
                unlink(public_path() . '/uploadimg' . '/' . $name);
            } catch (\Exception $er) {

            }

            DB::table('news')->where('nid', $id)->delete();
            return redirect('content?mes=deleteOK');
        } catch (\Exception $e) {
            return redirect('content?mes=deleteError');
        }
    }

}
