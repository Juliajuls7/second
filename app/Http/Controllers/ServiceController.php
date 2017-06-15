<?php

namespace App\Http\Controllers;
use App\Subcategory;
use App\Category;
use App\Service;
use App\StateService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
  public function __construct() {
      $this->middleware('auth');
  }

  public function index()
  {
        return view('services.index', ['services' => Service::orderByDesc('created_at')->paginate(8)]);

  }
  public function create()
  {
    return view ('service.create', [
      'categories' => Category::all()

    ]);
  }
  public function store(Request $request)
  {
      $service = new Service();

      $service->subcategory_id = $request->subcategory;
      $service->head = $request->head;
      $service->text = $request->text;
      $service->t_finish = $request->t_finish;
      $service->t_start = $request->t_start;
      $service->remote = $request->remote;
      $service->user()->services()->save($service);

      return redirect('/services');
  }
  public function show($id)
  {
      $service = Service::findOrFail($id);

      return view ('services.show', [
        'service' => $service,
        'comments' => $service->comments
      ]);
  }
  public function edit($id)
  {

      return view('services.edit',['service'=>Service::findOrFail($id),'categories'=> Category::all()]);
  }
  public function save(Request $request, $id)
  {
      $service = Question::findOrFail($id);
      $service->subcategory_id = $request->subcategory;
      $service->head = $request->head;
      $service->text = $request->text;
      $service->t_finish = $request->t_finish;
      $service->t_start = $request->t_start;
      $service->remote = $request->remote;
      $service->save();
      return redirect('/services');
  }
  public function destroy($id)
  {
     Question::findOrFail($id)->delete();
      return redirect('/services');
  }

}
