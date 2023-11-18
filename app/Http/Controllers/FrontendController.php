<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Software;
use App\Models\News;
use App\Models\Review;
use App\Models\Search;
use App\Models\Contact;
use App\Models\Password;
use Illuminate\Support\Facades\Hash;


class FrontendController extends Controller
{

 
  function Homepage(){
    $TrendingContent = Software::where('trending','1')->take(6)->get();
    $WindowsContent= Software::where('windows','Windows')->take(8)->get();
    $AndroidContent= Software::where('android','Android')->take(8)->get();
    $MacContent= Software::where('mac','Mac')->take(8)->get();
    $NewsContent = News::where('status','1')->take(6)->get();

   return view('index',compact('TrendingContent','WindowsContent','AndroidContent','MacContent','NewsContent'));
  }

  function CategoryList($id){
  $CategoryData = Software::where('category_id',$id)->paginate(10);
$CategoryTitle = Category::where('id',$id)->first();
  return view('categories',compact('CategoryData','CategoryTitle'));
  }

  function Windows(){
    $WindowsContent= Software::where('windows','Windows')->paginate(10);

    return view('windows',compact('WindowsContent'));
  }
  
  function Android(){
    $AndroidContent= Software::where('android','Android')->paginate(10);

    return view('android',compact('AndroidContent'));
  }
  
  function Mac(){
    $MacContent= Software::where('mac','Mac')->paginate(10);
    return view('mac',compact('MacContent'));
  }

  function Trending(){
    $TrendingContent = Software::where('trending','1')->paginate(10);

    return view('trending',compact('TrendingContent'));

  }

  function Search(Request $request){
$SearchSave = new Search;
$SearchSave->search = $request->input('search');
$SearchSave->save();
    $searchTerm = $request->input('search');


    $title = "Search Results for '{$searchTerm}'";
    $results = Software::where(function ($query) use ($searchTerm) {
      $query->where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('meta_keyword', 'like', '%' . $searchTerm . '%');
  })->paginate(10);
        return view('search', compact('results','title'));
  }

  function ApplicationData($slug){
    $data = Software::find($slug);
    $ReviewData = Review::find($slug);
    $TrendingContent = Software::where('trending','1')->take(6)->get();
    $LatestContent = Software::orderBy('created_at', 'desc')->get();
    $Review = Review::where('post_id',$slug)->get();
    $MetaDetail = Software::where('slug',$slug)->first();
    $ReviewDate = Review::where('updated_at',$slug)->first();
    $formattedDate = \Illuminate\Support\Carbon::parse($ReviewDate)->format('F j, Y');

    $result = Software::where('slug',$slug)->get();

    return view('application',compact('result','TrendingContent','LatestContent','Review','formattedDate','MetaDetail'));

  }

  function Review(Request $request){
    $review = new Review;
    $review->post_id = $request->input('post_id'); 
    $review->name = $request->input('name');
    $review->email = $request->input('email');
    $review->review = $request->input('review');

    $review->save();
    return back()->with('review', 'Thanks for the review');

  }

  function NewsList($slug){
    $NewsList = News::find($slug);
    $NewsList = DB::table('news')
    ->join('authors', 'news.author_id', '=', 'authors.id')
    ->select('news.*', 'authors.author as author_name')
    ->where('slug',$slug)
    ->get();
    $LatestNews = News::orderBy('created_at', 'desc')->get();
$MetaDetail = News::where('slug',$slug)->first();
    $NewsDate = News::where('updated_at',$slug)->first();
    $formattedDate = \Illuminate\Support\Carbon::parse($NewsDate)->format('F j, Y');
    return view('news',compact('NewsList','formattedDate','LatestNews','MetaDetail'));
  }

  function NewsAll(){

    $NewsAll =News::where('status','1')->paginate(10);

    return view('newsall',compact('NewsAll'));
  }

  function Info(){
    return view('info');
  }

  function Contact(){
    return view('contact');
  }

  function FormSubmit(Request $request){
 $store = new Contact;
 $store->name = $request->input('name');
 $store->email = $request->input('email');
 $store->message = $request->input('message');

 $store->save();
 return back()->with('message', 'Thank you for contacting us. We will respond you very soon.');
  }

  function FileDownload(){
    return view('filedownload');
  }

  public function DownloadFile(Request $request)
  {
      $submittedPassword = trim($request->input('password')); // Trim whitespace
      $storedPasswords = Password::pluck('passwords')->all();
  
      $found = false; // A flag to track whether a matching password is found
  
      foreach ($storedPasswords as $storedPassword) {
          if (strcasecmp($submittedPassword, trim($storedPassword)) === 0) {
              $found = true;
              break; // Exit the loop as we found a match
          }
      }
  
      if ($found) {
          $filePath = public_path('file\download.txt');
          $response = response()->download($filePath);
  
          // Delete the hashed password from the database
          Password::where('passwords', $submittedPassword)->delete();
  
          return $response;
      }
  
      return redirect()->back()->with('error', 'Incorrect password. Please try again.');
  }
  
}
