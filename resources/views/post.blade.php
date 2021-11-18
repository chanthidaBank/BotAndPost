@extends('layouts.app')

@section('header')

<style>		
	.title { font-size: 1.5em; font-weight: bold; }
	.header { font-size: 1.7em; font-weight: bold; }
	.subtitle { font-size: 1.6em; font-weight: bold; }	
	.name { font-size: 1em; color: red;  font-weight: bold;}	
	.role { font-size: 1em;  }	
	.place { font-size: 0.8em; }	
	.avatar { width:100px; }
	.col3  {  
		text-align: center;
		border-left: 1px solid #ccc;
	}	
	.panel  {box-shadow: 5px 5px 5px rgba(190, 174, 174, 0.3); }
	.bg-container {
	  background-color: rgb(242, 242, 242);		  
	}
	.pagination li a, .pagination>li>span { 			
		margin: 0 5px;			
		color: #000000 !important;
		border: 0px
	}
	.pagination>li.active>a {
	  border-radius: 50% !important;
	  color: white !important;
	  background: #cc0000!important;			 	  
	}

</style>	   
@endsection

@section('content')

	<div class="container">
		<p class="header">MAQE Forums</p>
		<p class="subtitle">Subtitle</p>
		<p class="title">Posts</p>

		@php
			$i=0;			
		@endphp

		 @foreach ($posts as $post)
		  <div class="panel panel-default">
		    
		    @if($i % 2 == 0)
		    	<div class="panel-body">
		    @else
		    	<div class="panel-body bg-container">
		    @endif

		    @php
		    	$i++;
		    @endphp
		    	<div class="col-xs-3">
			    	<img src="{{$post['image_url']}}" class="img-responsive">
			    </div>	
			    <div class="col-xs-7">	    	
			    	<div class="title">{{$post['title']}}</div>
					<div>{{$post['body']}}</div>				
					
					<p>
						<i class="text-muted">
						<i class="fa fa-clock-o" aria-hidden="true"></i> 
						@php
							echo \Carbon\Carbon::createFromTimeStamp(strtotime($post['created_at']))->diffForHumans();
						@endphp
						</i>
					</p>
				</div>

				 <div class="col-xs-2 col3">
				 	
						@foreach ($authors as $author)
							@if($author['id'] == $post['author_id'] )
							<img src="{{$author['avatar_url']}}" class="img-circle avatar">
								
								<div class="name">{{$author['name']}}</div>
								<div class="role">{{$author['role']}}</div>
								<div class="place"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$author['place']}}	</div>							
							@endif
						@endforeach
					
				</div>			
				
			</div>			

		  </div>
		  @endforeach
		
		 
	</div>

@endsection