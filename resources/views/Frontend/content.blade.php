
@if(isset($pages) && is_object($pages))

	@if(count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)
								<li>
									<h3 style="text-align: center;">{{ $error }}</h3>
								</li>
								@endforeach
							</ul>
						</div>
					@endif
					 @if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif
					
@foreach($pages as $key=>$page)
				
	@if($key%2 == 0)
		<section id="{{ $page->alias }}" class="top_cont_outer">
			<div class="hero_wrapper">
				<div class="container">
					<div class="hero_section">
						<div class="row">
							<div class="col-lg-5 col-sm-7">
								<div class="top_left_cont zoomIn wow animated">
									{!! $page->text !!}
									
									<a href="{{ route('page',['alias'=>$page->alias]) }}" class="read_more2">Read more</a> </div>
							</div>
							<div class="col-lg-7 col-sm-5">
<!--			Добавление данных при помощи сторонней библиотеки Collective HTML and FORM-->
								{!! Html::image('assets/img/'.$page->images) !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--Hero_Section-->
		

		
	@else
	<section id="{{ $page->alias }}">
		<!--Aboutus-->
		<div class="inner_wrapper">
			<div class="container">
				<h2>{{ $page->name }}</h2>
				<div class="inner_section">
					<div class="row">
						<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
							{!! Html::image('assets/img/'.$page->images,'' , array('class'=>'img-circle delay-03s animated wow zoomIn')) !!}
						</div>
						<div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
							<div class=" delay-01s animated fadeInDown wow animated">
								{!! $page->text !!}
							</div>
							<div class="work_bottom"> <span>Want to know more..</span> <a href="{{ route('page', array('alias'=>$page->alias)) }}" class="contact_btn">Contact Us</a> </div>
						</div>

					</div>


				</div>
			</div>
		</div>
	</section>
<!--Aboutus--> 
	@endif
	
@endforeach


@endif




<!--Service-->
@if(isset($services) && is_object($services))
<section  id="service">
  <div class="container">
    <h2>Services</h2>
    <div class="service_wrapper">
     
     @foreach($services as $key=>$service)
     	@if($key == 0 || $key%3 == 0)
<!--Формируем для сервиса проверку еси 0 или 3 значит формируем новый роу и есле он не нулевой значит добовляем верхнюю линию над нижними сервисами-->
     		<div class="row {{ ($key != 0) ? 'borderTop' : '' }}">
     		
     	@endif
	<!--     	Логика на левый бордер-->
			<div class="col-lg-4 {{ ($key%3 > 0) ? 'borderLeft' : '' }} {{ ($key > 2) ? 'mrgTop' : '' }}">
				<div class="service_block">
					<div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa {{ $service->icon }}"></i></span> </div>
					<h3 class="animated fadeInUp wow">{{ $service->name }}</h3>
					<p class="animated fadeInDown wow">{!! $service->text !!}</p>
				</div>
			</div>
     	
     	@if( ($key+1)%3 == 0 )
	 		</div>
     	@endif
     	
     @endforeach
     
    </div>
  </div>
</section>
<!--Service-->
@endif



<!-- Portfolio -->

@if(isset($portfolio))



<section id="Portfolio" class="content"> 
  
  <!-- Container -->
  <div class="container portfolio_title"> 
    
    <!-- Title -->
    <div class="section-title">
      <h2>Portfolio</h2>
    </div>
    <!--/Title --> 
    
  </div>
  <!-- Container -->
  
  <div class="portfolio-top"></div>
  
  <!-- Portfolio Filters -->
  <div class="portfolio"> 
    
    @if(isset($tags))
    <div id="filters" class="sixteen columns">
      <ul class="clearfix">
		  <li><a id="all" href="#" data-filter="*" class="active">
          <h5>All</h5></a></li>
			@foreach($tags as $tag)
           	<li>
           		<a class="" href="#" data-filter=".{{ $tag }}">
          			<h5>{{ $tag }}</h5>
          		</a>
          	</li>
           @endforeach
      </ul>
    </div>
    @endif

    <!--/Portfolio Filters --> 
    
    <!-- Portfolio Wrapper -->
    <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper">
		
		@foreach($portfolio as $item)
			<!-- Portfolio Item -->
			<div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   {{ $item->filter }} isotope-item">
				<div class="portfolio_img">{!! Html::image('assets/img/'.$item->images, $item->name) !!}</div>
				<div class="item_overlay">
					<div class="item_info">
						<h4 class="project_name">{{ $item->name }}</h4>
					</div>
				</div>
			</div>
			<!--/Portfolio Item --> 
		@endforeach
 
      
    </div>
    <!--/Portfolio Wrapper --> 
    
  </div>
  <!--/Portfolio Filters -->
  
  <div class="portfolio_btm"></div>
  
  
  <div id="project_container">
    <div class="clear"></div>
    <div id="project_data"></div>
  </div>
 
  
</section>
<!--/Portfolio --> 
@endif

@if(isset($clients))
<!--page_section-->
<section class="page_section" id="clients">
  <h2>Clients</h2>
<!--page_section-->
<!--client_logos-->
<div class="client_logos">
  <div class="container">
    <ul class="fadeInRight animated wow">
		@foreach($clients as $client)
		<li><a href="javascript:void(0)">{!! Html::image('assets/img/'.$client->icon, $client->name) !!}</a></li>
		@endforeach
    </ul>
  </div>
</div>
</section>

<!--client_logos-->
@endif

@if(isset($peoples) && is_object($peoples))
<!--main-section team-start-->
<section class="page_section team" id="team">
  <div class="container">
    <h2>Team</h2>
    <h6>Our team of specialists</h6>
    <div class="team_section clearfix">
		@foreach($peoples as $key=>$people)
		  <div class="team_area">
			<div class="team_box wow fadeInDown delay-0{{ ($key*3 + 3) }}s">
			  <div class="team_box_shadow"><a href="javascript:void(0)"></a>
				</div>{!! Html::image('assets/img/'.$people->images, $people->name) !!}
			</div>
			<h3 class="wow fadeInDown delay-0{{ ($key*3 + 3) }}s">{{ $people->name }}</h3>
			<span class="wow fadeInDown delay-0{{ ($key*3 + 3) }}s">{{ $people->position }}</span>
			<p class="wow fadeInDown delay-0{{ ($key*3 + 3) }}s">{{ $people->text }}</p>
		  </div>
		@endforeach
    </div>
  </div>
</section>
<!--/Team-->
@endif

