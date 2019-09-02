<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getListArticle()
  {

      $articles = Article::orderBy('id','DESC')->simplePaginate(3);
      $articleHot = Article::where('a_hot',Article::HOT)->get();
      return view('article.index',compact('articles','articleHot'));
  }
  public function getDetailArticle(Request $request)
  {
      $arrayUrl = $request->segment(2);
      $arrayUrl = preg_split('/(-)/i',$arrayUrl);

      if($id = array_pop($arrayUrl))
      {
          $articleDetail = Article::find($id);
          $articles = Article::orderBy('id','DESC')->paginate(3);
          $articleHot = Article::where('a_hot',Article::HOT)->get();
          $viewData = [
              'articles' => $articles,
              'articleDetail' => $articleDetail,
              'articleHot' => $articleHot
          ];

          return view('article.detail',$viewData);

      }
      return redirect('/');
  }
}
