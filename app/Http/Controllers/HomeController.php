<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Task::latest()->take(10)->get();

        return view('welcome', compact('orders'));
    }

    public function PendingTask()
    {
        $orders = Task::where('status', 'pending')->orderBy('id', 'desc')->get();
        $pasengercnt = Task::where('status', 'pending')->count();

        return view('pending_task', compact('orders', 'pasengercnt'));
    }

    public function Completetask()
    {
        $orders = Task::where('status', 'complete')->orderBy('id', 'desc')->get();
        $pasengercnt = Task::where('status', 'complete')->count();

        return view('complete_task', compact('orders', 'pasengercnt'));
    }

    public function AllTasks()
    {
        $orders = Task::orderBy('id', 'desc')->get();
        $pasengercnt = Task::count();

        return view('all_task', compact('orders', 'pasengercnt'));
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
        }

    public function TaskShow ($id) {
        $post = Task::findorfail($id);
        return $post;
    }

    public function deleteTask ($id) {
        Task::destroy($id);
        Session::flash('success', 'Admin Deleted successfully!');
        return redirect()->back();
    }

    public function editTasks($id)

    {
        $product = Task::where('id', $id)->first();;
        return view('edittask', compact(['product']));
    }

        public function Updatetask(Request $request, $id)
    {
        $order = Task::where('id', $id)->first();


        $order->title = $request->title;
        $order->status = $request->status;
        $order->body = $request->body;


        $order->save();

        Session::flash('success', 'Task Updated Successfully');
        return redirect()->back();
    }

    public function destroy ($page, $id) {

        if ($page == 'task') {

            $delete = Task::find($id);

            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', 'Task deleted successfully.');
            return redirect()->back();



    }
}

    public function addTask(Request $request)
    {

      $validator = Validator::make($request->all(), [
          'title'         => 'required|string|unique:tasks',
          'body'         => 'required'
      ]);

      if($validator->fails())
      {
          return redirect()->back()->withErrors($validator->errors())->withInput();
      }

            $user             = new Task();
            $user->title   = $request->title;
            $user->body   = $request->body;
            $user->status   = "pending";

            $user->save();


            Session::flash('success', 'Task created successfully');

        return redirect()->back();

        }
}
