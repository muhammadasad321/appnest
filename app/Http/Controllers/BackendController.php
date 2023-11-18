<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Software;
use App\Models\Review;
use App\Models\News;
use App\Models\Author;
use App\Models\Search;
use App\Models\Contact;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Crypt;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BackendController extends Controller
{
    function index(){
        $totalapps = Software::count();
        $totalcategories = Category::count();
        $totalnews = News::count();
        $visitorCount = DB::table('visitors')->count();

    return view('admin.index', compact('totalapps','totalcategories','totalnews','visitorCount'));
    }

    function categories(){
        $categories = Category::all();
        return view('admin.categories',compact('categories'));
    }

    function login(){
        return view('admin.login');

    }

    function loggedIn(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $user = User::where('username', $credentials['username'])->first();
    
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->with('failed', 'Username or Password in incorrect');
        }
    
        // Authentication successful
        // You can set a session variable to indicate that the user is logged in.
        session(['username' => $user->username]);
    
        return redirect('admin/dashboard'); // Redirect to a dashboard or any other route
    }
    
    function logout()
    {
        session()->forget('username');
        return redirect('admin/login'); // Redirect to the login page
    }

    function register(){
        return view('admin/register');
    }

    function registered(Request $request){
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));

        return view('admin/credential',[
            'username' => $username,
            'password' => $password,
        ])->with('credendials','These are the new credentials');

    }

    //category controller section

    function CategoryStore(Request $request){
      $store = new Category;
      $store->name = $request->input('name');
      $store->status = '1';
      $store->save();
        
      return redirect()->back()->with('success', 'Category added successfully');


    }

    function CategoryList(){
        $CategoryList = Category::all();
        return view('admin.categorylist',compact('CategoryList'));
    }

    function CategoryEdit($id){
        $data = Category::find($id);
        return view('admin.categoryedit',['data'=>$data]);
        
    }

    function CategoryUpdate(Request $request){
        $update = Category::find($request->input('id'));
        $update->name = $request->input('name');
        $update->status = '1';
        $update->save();
          
        return redirect('admin/categorylist')->with('update', 'Category updated successfully');
  
  
    }

    function CategoryStatus($id){
         $data = Category::find($id);

        if($data){
            if($data->status){
                $data->status = 0;
            }else{
                $data->status =1;
            }

            $data->save();
        }
        
        return back();
    }

    function CategoryDelete($id){
        Category::find($id)->delete();
        return redirect('admin/categorylist')->with('delete', 'Category deleted successfully');


    }


    //Adding application section

    function addsoftware(){
        $CategoryList = Category::where('status','1')->get();


        return view('admin.addsoftware',compact('CategoryList'));
    }
function SoftwareList(){
    $SoftwareList = DB::table('softwares')
    ->join('categories', 'softwares.category_id', '=', 'categories.id')
    ->select('softwares.*', 'categories.name as category_name')
    ->get();
  
    return view('admin.softwarelist',compact('SoftwareList'));

}
    function SoftwareStore(Request $request){
       
        
        $store = new Software;
        $store->category_id = $request->input('category_id'); 

      $store->name = $request->input('name');
      $slug = Str::slug($request->input('name'));
      $store->slug =$slug;


      $store->windows = $request->input('windows');
      $store->android = $request->input('android');
      $store->mac = $request->input('mac');
      $store->trending = $request->input('trending');

      $store->licence = $request->input('licence');

      if($request->hasFile('image'));
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalName();
        $filename = time().'_'.$extension;
        $file->move('upload/images/', $filename);
        $store->image = $filename;
    }
      $store->version = $request->input('version');
      $store->tagline = $request->input('tagline');
      $store->description = $request->input('description');
      $store->file_url = $request->input('file_url');
      $store->meta_title = $request->input('meta_title');
      $store->meta_desc = $request->input('meta_desc');
      $store->meta_keyword = $request->input('meta_keyword');
      $store->status = '1';
      $store->save();
        
      return redirect('admin/softwarelist')->with('add', 'Application added successfully');

    }

    function SoftwareEdit($id){

        $data = DB::table('softwares')
        ->join('categories', 'softwares.category_id', '=', 'categories.id')
        ->select('softwares.*', 'categories.name as category_name')
        ->where('softwares.id','=',$id)
        ->get();

        $CategoryList = Category::where('status','1')->get();

        return view('admin.softwareedit',['data'=>$data,'CategoryList'=>$CategoryList]);

    }

    function SoftwareUpdate(Request $request){
      

        $update = Software::find($request->input('id'));
        $update->category_id = $request->input('category_id'); 

      $update->name = $request->input('name');
      $slug = Str::slug($request->input('name'));
      $update->slug =$slug;
      $update->windows = $request->input('windows');
      $update->android = $request->input('android');
      $update->mac = $request->input('mac');
      $update->trending = $request->input('trending');
      $update->licence = $request->input('licence');

      if ($request->hasFile('image'))
      
      {
    $destination = 'upload/images/' . $update->image;
    
    if (File::exists($destination)) {
        File::delete($destination);
    }

    $file = $request->file('image');
    $extension = $file->getClientOriginalExtension(); // Get the file extension
    $filename = time() . '_' . $extension;
    $file->move('upload/images/', $filename);
    $update->image = $filename;
}
      $update->version = $request->input('version');
      $update->tagline = $request->input('tagline');
      $update->description = $request->input('description');
      $update->file_url = $request->input('file_url');
      $update->meta_title = $request->input('meta_title');
      $update->meta_desc = $request->input('meta_desc');
      $update->meta_keyword = $request->input('meta_keyword');
      $update->status = '1';
      $update->save();
        
      return redirect('admin/softwarelist')->with('app-update', 'Application updated successfully');

    }

    function SoftwareDelete($id){
        Software::find($id)->delete();
        return redirect('admin/softwarelist')->with('app-delete', 'Application deleted successfully');


    }

    function SoftwareStatus($id){
        $data = Software::find($id);

       if($data){
           if($data->status){
               $data->status = 0;
           }else{
               $data->status =1;
           }

           $data->save();
       }
       
       return back();
   }

   function AddNews(){
    $AuthorList = Author::all();
    return view('admin.addnews',compact('AuthorList'));
   }

   function StoreNews(Request $request){
   
    $store = new News;

    $store->title = $request->input('title');
    $slug = Str::slug($request->input('title'));
      $store->slug =$slug;
    $store->author_id = $request->input('author_id');
    if($request->hasFile('image'));
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalName();
        $filename = time().'_'.$extension;
        $file->move('upload/news/', $filename);
        $store->image = $filename;
    }

    $store->article = $request->input('article');
    $store->meta_title = $request->input('meta_title');
    $store->meta_desc = $request->input('meta_desc');
    $store->meta_keyword = $request->input('meta_keyword');
    $store->status = '1';

    $store->save();

    return redirect('admin/newslist')->with('add-news', 'News Added Successfully');

   }

   function NewsEdit($id){

    $data = DB::table('news')
    ->join('authors', 'news.author_id', '=', 'authors.id')
    ->select('news.*', 'authors.author as author_name')
    ->where('news.id','=',$id)
    ->get();

    $AuthorList = Author::all();

    return view('admin.newsedit',['data'=>$data,'AuthorList'=>$AuthorList]);

}

function NewsUpdate(Request $request){
   
    $update = new News;
    $update = News::find($request->input('id'));

    $update->title = $request->input('title');
    $slug = Str::slug($request->input('title'));
      $update->slug =$slug;
    $update->author_id = $request->input('author_id');
    if ($request->hasFile('image'))
      
    {
  $destination = 'upload/news/' . $update->image;
  
  if (File::exists($destination)) {
      File::delete($destination);
  }

  $file = $request->file('image');
  $extension = $file->getClientOriginalExtension(); // Get the file extension
  $filename = time() . '_' . $extension;
  $file->move('upload/news/', $filename);
  $update->image = $filename;
}
    $update->article = $request->input('article');
    $update->meta_title = $request->input('meta_title');
    $update->meta_desc = $request->input('meta_desc');
    $update->meta_keyword = $request->input('meta_keyword');

    $update->status = '1';

    $update->save();

    return redirect('admin/newslist')->with('update-news', 'News updated Successfully');

   }

   function NewsList(){
    $NewsList = DB::table('news')
    ->join('authors', 'news.author_id', '=', 'authors.id')
    ->select('news.*', 'authors.author as author_name')
    ->get();

    return view('admin/newslist',compact('NewsList'));

   }

   function NewsDelete($id){
    News::find($id)->delete();
    return redirect('admin/newslist')->with('delete','News deleted successfully');
   }

   function NewsStatus($id){
    $data = News::find($id);

   if($data){
       if($data->status){
           $data->status = 0;
       }else{
           $data->status =1;
       }

       $data->save();
   }
   
   return back();
}

   function AddAuthor(){

   
    return view('admin.addauthor');
   }

   function StoreAuthor(Request $request)
   {

    $store = new Author;

    $store->author = $request->input('author');
    $store->save();
    return redirect('admin/authorlist')->with('add-author', 'Author added successfully');

   }

   function AuthorList(){
    $AuthorList = Author::all();

    return view('admin/authorlist',compact('AuthorList'));
   }

   function AuthorDelete($id){
    Author::find($id)->delete();
    return redirect('admin/authorlist')->with('delete', 'Author deleted successfully');

   }

   function ReviewList(){

    $ReviewList = Review::all();
    return view('admin/reviewlist',compact('ReviewList'));
   }

   function ReviewDelete($id){
   Review::find($id)->delete();
    return redirect('admin/reviewlist')->with('delete', 'Review deleted successfully');


}

function SearchList(){
    $SearchList = Search::orderBy('created_at', 'desc')->get();
    return view('admin/searchlist',compact('SearchList'));
}

function SearchDelete($id){
    Search::find($id)->delete();
    return back(); 
}

function ContactData(){
    $ContactData = Contact::orderby('created_at','desc')->get();
    return view('admin/contact',compact('ContactData'));
}

public function ContactDelete($id) {
    // Find the contact by ID
    $contact = Contact::find($id);

    if ($contact) {
        // If the contact exists, delete it
        $contact->delete();

        // Optionally, you can redirect back to the contact list page or return a success message
        return back()->with('delete', 'Contact deleted successfully');
    } else {
        // Handle the case when the contact does not exist
        return back()->with('error', 'Contact not found');
    }
}

}