<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">
        <h3 class="panel-title">Категории</h3>
    </div>

    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            @foreach($categories as $category)
            <li>
                <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  {{$category->name}}
                  @if (count($category->subcategories)>0)
                    <span class="caret"></span>
                  @endif
                </a>

                @if (count($category->subcategories)>0)
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach ($category->subcategories as $sub)
                      <li><a href="#">{{$sub->name}}</a></li>
                    @endforeach
                  </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>
