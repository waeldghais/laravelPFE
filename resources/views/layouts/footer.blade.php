
<!-- Start footer -->
  <footer id="mu-footer">
    <!-- start footer top -->
    <div class="mu-footer-top">
      <div class="container">
        <div class="mu-footer-top-area">
          <div class="row">

              <div class="col-md-12">

            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="mu-footer-widget">

                <h4>Contact</h4>
                <address>
                  <p>{{$Settings->adresse}}</p>
                  <p>Tel: (216) {{$Settings->phone_number}} </p>
                  <p>Fixe:(216) {{$Settings->other_Phone}}</p>
                  <p>Email:{{$Settings->blog_email}}</p>
                </address>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="mu-footer-widget">
                <h4>Navigation</h4>
                <ul>
                  <li><a href="{{ route('index')}}">Acceuil</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Matieres</a>
                        <ul class="dropdown-menu" >
                            @foreach($categories as $cat)
                                <li><a href="{{ route('WebSite.matiere',['matiere_id'=>$cat->id]) }}">{{$cat->name}}</a></li>
                            @endforeach
                        </ul></li>
                    <li><a href="{{route('packs')}}"> Packs</a></li>
                    <li><a href="{{route('WebSite.live')}}">Cours en direct</a></li>
                    <li><a href="{{route('utilisation')}}">Manuel d'utilisation</a></li>
                  <li><a href="{{route('WebSite.contact')}}">contact</a></li>

                </ul>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="mu-footer-widget">
                <h4>Suivez nous</h4>


                  <a href="https://www.facebook.com/CLVTunis/"><i class="fa fa-facebook-square" style="font-size:48px;color:mediumblue"></i></a></li>
                  <br><br>
                  <h4>RIB :  {{$Settings->RIB}}</h4>

              </div>
            </div>
              </div>
              <div class="col-md-12">
                  <div class="col-md-6"><h4 style="color: orange;">Centre de Langues Vivantes - Tunis</h4></div>
                  <div class="col-md-3"><h4 style="color: orange;"> Lundi - Vendredi <i class="fa fa-calendar"></i></h4></div>
                  <div class="col-md-3"><h4 style="color: orange;">9:30 - 18:00 <i class="fa fa-clock-o"></i></h4></div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end footer top -->
  </footer>
  <!-- End footer -->
