@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
                    <div class="box">
    <div class="container">
     	<div class="row">
		 @if(Auth:: user()->user_type->level == 'admin')
			    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
					<div class="box-part text-center">
                        
                        <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
                        
						<div class="title">
							<h4>User types</h4>
						</div>
						<img src="   https://cdn-icons-png.flaticon.com/512/13296/13296598.png " alt="Girl in a jacket" style="width:150px;height:150px;">

						<div class="text">
							<span>Niveles de usuario en el sistema existentes.</span>
						</div>
                        
						<a href="{{ URL::asset('/usertypes') }}">CRUD User Types</a>
					 </div>
				</div>	 
				
				 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
					<div class="box-part text-center">
					    
					    <i class="fa fa-twitter fa-3x" aria-hidden="true"></i>
                    
						<div class="title">
							<h4>Users</h4>
						</div>
						<img src="   https://cdn-icons-png.flaticon.com/512/681/681392.png " alt="Girl in a jacket" style="width:150px;height:150px;">
						<div class="text">
							<span>Crear nuevo usuaio o ver usuarios existentes.  </span>
						</div>
                        
						<a href="{{ URL::asset('/users') }}">CRUD User </a>
                        
					 </div>
				</div>	 
			
				 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
					<div class="box-part text-center">
                        
                        <i class="fa fa-facebook fa-3x" aria-hidden="true"></i>
                        
						<div class="title">
							<h4>Mesas de trabajo</h4>
						</div>
						<img src="      https://cdn-icons-png.flaticon.com/512/3374/3374170.png  " alt="Girl in a jacket" style="width:150px;height:150px;">
						<div class="text">
							<span>Creacion de mesas de trabajo y ver existentes mesas de trabajo.</span>
						</div>
                        
						<a href="{{ URL::asset('/workspaces') }}">CRUD Work Spaces</a>
                        
					 </div>
				</div>	 
				@endif

				@if(Auth:: user()->user_type->level == 'admin' || Auth:: user()->user_type->level == 'profesor')
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
					<div class="box-part text-center">
                        
                        <i class="fa fa-pinterest-p fa-3x" aria-hidden="true"></i>
                        
						<div class="title">
							<h4>Usuarios de mesas de trabajo</h4>
						</div>
						<img src="https://cdn-icons-png.flaticon.com/512/11743/11743335.png" alt="Girl in a jacket" style="width:150px;height:150px;">
						<div class="text">
							<span>Ver usuarios asignados a sus respectivas mesas de trabajo o asignar nuevos usuarios a mesas.</span>
						</div>
                        
						<a href="{{ URL::asset('/workspaceuser') }}">CRUD WOrk Space Users</a>
                        
					 </div>
				</div>	 
				@endif 

				 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
					<div class="box-part text-center">
					    
					    <i class="fa fa-google-plus fa-3x" aria-hidden="true"></i>
                    
						<div class="title">
							<h4>Formularios</h4>
						</div>
						<img src="   https://cdn-icons-png.flaticon.com/512/6728/6728483.png " alt="Girl in a jacket" style="width:150px;height:150px;">
						<div class="text">
							<span>Visualizar formularios existentes.</span>
						</div>
                        
						<a href="{{ URL::asset('/forms') }}">CRUD Forms</a>
                        
					 </div>
				</div>	 
				
				 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
					<div class="box-part text-center">
                        
                        <i class="fa fa-github fa-3x" aria-hidden="true"></i>
                        
						<div class="title">
							<h4>Exportado raw para formularios</h4>
						</div>
                        <img src="   https://cdn-icons-png.flaticon.com/512/5414/5414637.png " alt="Girl in a jacket" style="width:150px;height:150px;">
						<div class="text">
							<span>Exportar formularios a excel.</span>
						</div>
                        
						<a href="{{ URL::asset('/viewexport') }}">Learn More</a>
                        
					 </div>
				</div>
		
		</div>		
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
