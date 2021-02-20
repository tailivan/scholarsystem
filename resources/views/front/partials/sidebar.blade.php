<div class="col-lg-4">

    <div class="sidebar" data-aos="fade-left">

      <h3 class="sidebar-title">Search</h3>
      <div class="sidebar-item search-form">
        <form action="">
          <input type="text">
          <button type="submit"><i class="icofont-search"></i></button>
        </form>

      </div><!-- End sidebar search formn-->

      <h3 class="sidebar-title">Categories</h3>
      <div class="sidebar-item categories">
        <ul>
          <li><a href="#">General <span>(25)</span></a></li>
          
        </ul>

      </div><!-- End sidebar categories-->

      <h3 class="sidebar-title">Derniers comptes-rendus</h3>
      <div class="sidebar-item recent-posts">

        @foreach ($recit as $item)
        <div class="post-item clearfix">
          <img src="{{ asset('upload/recit_image/'.$item->image) }}" alt="">
          <h4><a href="{{ route('blog.single', $item->id) }}">{{ $item->title }}</a></h4>
          <time datetime="2020-01-01">{{ $item->created_at }}</time>
        </div>
        @endforeach
        

        

       

      </div><!-- End sidebar recent posts-->

      

    </div><!-- End sidebar -->

  </div><!-- End blog sidebar -->