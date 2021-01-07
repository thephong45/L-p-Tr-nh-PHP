<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Post;

class PostController extends Controller
{
    // ================ Phan 9 ============================
    //=============== Thêm dữ liệu vào bảng ================
    public function add()
    {

        // ============== Query Builder ===========================
//        DB::table('posts')->insert(['title'=>'Tiêu đề 2','content'=>'Nội dung 2', 'user_id'=>1]);

        //================ ORM ===================================
        //============ Lưu, thêm bằng phương thức save() =================
        //posts đại diện cho 1 bảng ghi, bên trong post có các thuộc tính của bảng posts
        //Khi có nhiều dữ liệu thì không dùng

//        $posts = new Post();
//        $posts->title = 'Laravel Pro 2020';
//        $posts->content = 'Khóa học uy tín nhất';
//        $posts->user_id = 3;
//        $posts->votes = 25;
//
//        $posts->save();

        //============ Lưu, thêm bằng phương thức create() =================
//        Post::create([
//            'title' => 'Dell XPS 2016',
//            'content' => 'Thương hiệu Việt Nam ',
//            'user_id' => 3,
//            'votes' => 36
//        ]);

        //================ Phần 12: Form ================
        return view('post.create');

    }

//     Validate dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            //là những role, các quy tắc cách nhau dấu gạch đứng, ví dụ'title' => 'required|min:5|max:10'


            'title' => 'required',
            'content' => 'required'
        ],
            [
                //Hiển thị cho người dùng
                'required' => ':attribute không được để trống',
            ],
            [
                'title' => 'Tiêu đề ',
                'content' => 'Nội dung'
            ]);

        // return $request->input();


        //Lấy tất cả dữ liệu trong request
        $input = $request->all();

        //Nếu có file thì thêm  đường dẫn file vào  mảng input và lưu và data

        //Kiểm tra file có tồn tại hay không
        if ($request->hasFile('file')) {
            //Gán file vào bên trong biến file và lấy các thông tin
            $file = $request->file;
            //Lấy tên file
            $filename = $file->getClientOriginalName();
            //Lấy đuôi file
            var_dump($file->getClientOriginalExtension());
            //Lấy loại file của file
            var_dump($file->getClientMimeType());
            //Kích thước
            var_dump($file->getSize());
            //Upload file lên server
            $path = $file->move('public/uploads', $file->getClientOriginalName());

            $thumbnail = 'public/uploads/' . $filename;
            $input['thumbnail'] = $thumbnail;


        }

        $input['user_id'] = 3;
        $input['votes'] = 50;


        //Đưa dữ liệu form vào data
        Post::create($input);
        // Chuyển hướng dến url post/show
//        return redirect('post/show');
        //Đặt tên mới cho url -> Chuyển hướng đến route
        return redirect()->route('post.show');



    }


    //=============== Lấy dữ liệu hiển thị ra  ================
    public function show()
    {

        // ============== Query Builder ===========================

        //Lấy tất cả, danh sách các bảng ghi, trả về là 1 object
        //$posts = DB::table('posts')->get();
        //Lấy danh sách các bảng ghi với 1 số trường ta muốn lấy
        //$posts = DB::table('posts')->select('title', 'content')->get();

//        foreach ($posts as $post){
//            echo $post->content;
//            echo "<br>";
//
//        }

        //Lấy 1 bảng ghi
//        $posts = DB::table('posts')->where('id',2)->first();
//        echo $posts->title;
//        print_r($posts);

        //Lấy bảng ghi theo id
//        $posts = DB::table('posts')->find(1);
//        echo $posts->title;
//        print_r($posts);

        //Đếm số lượng bản ghi
//        $number_posts = DB::table('posts')->where('user_id',1)->count();
//        echo $number_posts;

        //Tính max, min, avg
//        $max = DB::table('posts')->max('user_id');
//        $min = DB::table('posts')->min('user_id');
//        $avg = DB::table('posts')->avg('user_id',0);
//        echo $max . ' ' . $min . ' ' . $avg;

        // Kết nối (join) để lấy dữ liệu
//        $posts = DB::table('posts')->join('users','users.id','=', 'posts.user_id')
//            ->select('users.name', 'posts.title')->get();
//        var_dump($posts);
//        return $posts;


        //Lấy dữ liệu theo điều kiện
//        $posts = DB::table('posts')->where('user_id', '>',3)->get();
//        $posts = DB::table('posts')->where('title', 'Like','%iphone%')->get();
//        return $posts;

        //Lấy dữ liêu phép AND và OR
        // Điều kiện AND lấy ra title = iphone và votes != 0
//        $posts = DB::table('posts')->where(
//            [
//                ['title','like','%iphone%'],
//                ['votes', '<>', 0]
//            ]
//        )->get();
//        var_dump($posts);
        // Điều kiện OR: votes < 60 hoặc user_id < 7
//        $posts = DB::table('posts')->where('votes', '<', 20)
//            ->orWhere('user_id','=', 3)->get();
//
//        echo '<pre>';
//        print_r($posts);
//        echo '</pre>';

        //Lấy dữ liệu theo nhóm : group by
//        $posts = DB::table('posts')->selectRaw("count('id') as number_post, user_id")
//            ->groupBy('user_id')
//            ->orderBy('number_post')
//            ->get();
//
//        echo '<pre>';
//        print_r($posts);
//        echo '</pre>';

        //Sắp xếp trường votes tăng hay giảm bằng order by, mặc định sẽ là asc, giảm là desc
//        $posts = DB::table('posts')->orderBy('votes')->get();
//        echo '<pre>';
//        print_r($posts);
//        echo '</pre>';

        //Lấy ra số bản ghi giới hạn: limit và offset
//        $posts = DB::table('posts')
//            ->offset(1)
//            ->limit(2)
//            ->get();
//
//        echo '<pre>';
//        print_r($posts);
//        echo '</pre>';


        //================== Phần 12 ====================
        //Lấy tất cả
        $posts = Post::all();
        return view('post.index', compact('posts'));


    }

    //=============== Cập nhật liệu vào bảng ================
    //Trong update sẽ là 1 mảng gồm key ứng với tên trường, value ứng với giá trị cập nhật
    public function update($id)
    {


        // ============== Query Builder ===========================
//        DB::table('posts')->where('id',$id)
//            ->update([
//                'title' => 'Macbook Pro 2020',
//                'votes' => 20
//            ]);

        //================== ORM ==================================
        //Update theo phương thức save -> Không khuyến khích dùng vì khi có nhiều bảng ghi rất bất cập
//        $posts = Post::find($id);
//        $posts->title = 'KMA security 2020';
//        $posts->content = 'Khóa học tìm năng';
//        $posts->user_id = 1;
//        $posts->votes = 27;
//
//        $posts->save();
        //============ Cập nhật phương thức update =================
        $posts = Post::where('id', $id)->update([
            'title' => 'Dell XPS 2019',
            'description' => 'Máy tính chính hãng',
            'content' => 'Dòng sản phẩm nổi bật',
            'user_id' => 3,
            'votes' => 33
        ]);


    }


    //=============== Xoa du liệu vào bảng ================
    public function delete($id)
    {

        // ============== Query Builder ===========================
//        return DB::table('posts')->where('id', $id)
//            ->delete();

        //================== ORM ==================================
        // Xóa 1 bảng ghi với phương thức delete, có thể gọi theo 2 cách
        //Cách 1:
//        $posts = Post::find($id)->delete();
        //Cách 2:
//        $posts = Post::find($id);
//        $posts->delete();

        //======== Xóa bảng ghi với phương thức delete theo điều kiện
//        Post::where('user_id', 1)->delete();

        //======== Xóa bảng ghi với phương thức destroy(), trả về số lượng bản ghi đã xóa
        // Có thể xóa 1 hay nhiều bảng ghi

//        Post::destroy($id);
//        return Post::destroy([13,15]);

        //Xóa sau khi cài softdelete, xóa tạm thời
        $posts = Post::find($id);
        $posts->delete();


    }



    // ===================== Phần 10: ORM =======================
    // ================= Lấy tất cả các bảng ghi của 1 bảng =========
    public function read()
    {

        //Lấy tất cả các bảng ghi của 1 bảng
//        $posts = Post::all();
//        return $posts;

        // Lấy danh sach ban ghi  thông qua điều kiện
//        $posts = Post::where('title', 'like', '%iphone%')->get();
//        return $posts;

        //Lấy 1 bảng ghi thông qua điều kiện
//        $post = Post::where('user_id',7)->first();
//        return $post;
        //Lấy ra 1 phần tử của đối tượng
//        return $post->title;

        //Lấy 1 bảng ghi theo id
//        $post = Post::find(1);
//        return $post;

        // Lấy danh sách bảng ghi theo id
//        $posts = Post::find([1, 3]);
//        return $posts;

        //Order by sắp xếp dữ liệu trong thống kê
//        $post = Post::orderBy('votes')->get();
//        return $post;

        //Group by nhóm: tính toán dữ liệu theo nhóm
//        $posts = Post::selectRaw("count('id') as number_post, user_id")
//            ->groupBy('user_id')
//            ->orderBy('number_post')
//            ->get();
//        return $posts;

        //Limit: lấy số lượng bảng ghi, offset() bỏ qua số lượng bản ghi tính từ đầu
//        $posts = Post::limit(3)->offset(1)->get();
//        return $posts;

        //======================== ORM =====================
        //Xuất sau khi cài softdelete, xuất dữ liệu xóa tạm thời
        //Lấy tất cả dữ liệu xóa và không xóa
//        $posts = Post::withTrashed()->get();
//        return $posts;

        //Lấy dữ liệu xóa tạm thời
//        $posts = Post::onlyTrashed()->get();
//        return $posts;

        //Lấy ra phần tử chưa xóa
//        $posts = Post::withoutTrashed()->get();
//        return $posts;

        //=================== Phần 10 =====================
        // One - to - one
        //FeaturedImage la 1 phương thức định nghĩa trong model Post
//        $img = Post::find(11)->FeaturedImage;
//        return $img;


        // One - to - many
        // Lấy ra user tạo ra bài biết
        $user = Post::find(16)->user;
        return $user;

        //Kiểm tra user đã tạo ra bài viết nào
//        $post = User::find(7)->posts;
//        return $post;


    }

    //Khôi phục dữ liệu đã xóa tạm softdelete
    public function restore($id)
    {
        Post::onlyTrashed()->where('id', $id)->restore();

    }

    //Xóa vĩnh viễn với softdelete
    public function permanentlyDelete($id)
    {
        Post::onlyTrashed()->where('id', $id)->forceDelete();
    }


}
