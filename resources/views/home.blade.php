@extends('layout')
@section("content")
<br><br><br>
<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>
    <div class="container">
        @foreach($posts as $post)
        <div class="col-12">
            <div class="card">
                <br>
                <a class="text-decoration" href="{{url('/ShowPost')}}/{{$post->slug}}">
                    <h4 class="card-title center"><strong><i>{{$post->title}}</i></strong></h4>
                </a>
                <div class="container">
                    <table>
                        <tr>
                            <td><a href="{{url('/profile')}}/{{$post->user_name}}"><img class="card-img-top img-use"
                                        src="{{url('/image_user')}}/{{$post->img_user}}" alt="{{$post->user_name}}"></a>
                            </td>
                            <td style="width:160vh"><a class="a-user-name" href="{{url('/profile')}}/{{$post->user_name}}"><span
                                        class="card-text"><b>{{$post->name}}</b></span></a></td>
                            <td style="text-align:center;width:200vh;"><span class="card-text">{{$post->time}}</span></td>

                            <td class="td-setting">
                                <form action="{{ url('/DeletePost')}}" id="formimage" method="POST"
                                    enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="btn-group " role="group" aria-label="">
                                        <div class="btn-group" role="group">
                                            <input type="image" style="width:8vh;height:6vh;"
                                                src="{{asset('/image/setting.png')}}"
                                                class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            <ul class="dropdown-menu" s>
                                                @if(Auth::user()->name == $post->user_name)
                                                <!-- <li style="text-align:center;"><input class="btn-delete" type="submit" value="Delete"></li>
                                                    <li style="text-align:center;"><a class="btn-update" href="#" onclick="Showupdate_post()" >Update</a></li> -->
                                                @endif
                                                <li style="text-align:center;"><a class="btn-detaills"
                                                        href="{{url('/ShowPost')}}/{{$post->slug}}">Detaills</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <input type="hidden" name="slug" value="{{$post->slug}}" id="">
                                    <!-- <input type="image" type="submit" src="{{asset('/image/delete.png')}}"
                                            style="width:5vh;height:5vh"> -->
                                </form>
                            </td>

                        </tr>
                    </table>
                </div>
                <div class="img container">
                    <table>
                        <tr>
                            <td style="width:5vh"></td>
                            <td style="width:100%"><a href="{{url('/ShowPost')}}/{{$post->slug}}"><img class="img-post"
                                        src="{{asset('/image_post')}}/{{$post->image_post}}" alt="{{$post->title}}"></a>
                            </td>
                            <td style="width:5vh"></td>
                        </tr>
                    </table>
                </div>
                <div class="container">
                    <div class="container">
                        <table>
                            <tr>
                                <form action="{{ url('/AddFollowHome')}}" id="formimage" method="POST"
                                    enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <input type="hidden" name="slug" value="{{$post->slug}}">
                                    <td style="width:10vh;text-align:center"><input class="imgfollow" type="image"
                                            id="{{$post->slug}}" src="{{asset('/image/like.png')}}"
                                            style="width:5vh;height:5vh;" alt="Submit">
                                    </td>
                                    <td>
                                        <div class="btn-group " role="group" aria-label="">
                                            <div class="btn-group" role="group">
                                                <botton style="width:8vh;height:6vh;"
                                                    class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <?php
                                    $var = 0;
                                    $userslug = Auth::user()->name.''.$post->slug;
                                    foreach($foll as $f){
                                        if($post->slug == $f->slug_follow){
                                         $var++;
                                        }
                                    }
                                    if($var >= 1000000){
                                        $v = $var/1000000 ;
                                        $v1 = $v.'M';
                                    }
                                    elseif($var >= 1000000000){
                                        $v= $var/1000000000;
                                        $v1= $v.'ML';
                                    }
                                    elseif($var >= 1000){
                                        $v= $var/1000;
                                        $v1= $v.'K';
                                    }
                                    else{
                                        $v1= $var;
                                    }
                                    echo '<strong>'.$v1.' Like</strong>' ;
                                    ?>
                                                </botton>
                                                <ul style="text-align:center;margin-top: -8px;    margin-left: 18px;"
                                                    class="dropdown-menu">
                                                    <?php
                                                $follow = 0;
                                                foreach($foll as $f){
                                                    if($post->slug == $f->slug_follow){
                                                        $follow++;
                                                    }
                                                } 
                                                if($follow > 10){
                                                    $var=0;
                                                    foreach($foll as $ff){
                                                        if($post->slug == $ff->slug_follow){
                                                            if($var == 10){
                                                            break;
                                                            }
                                                            else{    
                                                                ?>
                                                    <li><a
                                                            href="{{url('/profile')}}/<?php echo $ff->user_follow?>"><?php echo $ff->user_follow; ?></a>
                                                    </li>
                                                    <?php
                                                              
                                                            }
                                                        }
                                                        $var++;
                                                    }
                                                    $somm =$follow -10;
                                                    echo '<li>And '.$somm.' Auther</li>';
                                                }else{
                                                    foreach($foll as $ff){
                                                        if($post->slug == $ff->slug_follow){
                                                           ?>
                                                    <li><a
                                                            href="{{url('/profile')}}/<?php echo $ff->user_follow?>"><?php echo $ff->user_follow; ?></a>
                                                    </li>
                                                    <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>

                                    <td style="width:200vh;text-align:right;margin-top:-3px;">
                                        <strong>{{$post->category_name}}</strong></td>
                                </form>
                            </tr>
                        </table>
                    </div>
                </div>
                @foreach($foll as $f)
                @if($f->slug_plus_user == Auth::user()->name.$post->slug)
                <script>
                /* $(follow).addClass("err"); */
                var elem = document.getElementById("{{$post->slug}}");
                elem.setAttribute("src", "{{asset('/image/like1.png')}}");
                </script>
                @break
                @else
                <script>
                var elem = document.getElementById("{{$post->slug}}");
                elem.setAttribute("src", "{{asset('/image/like.png')}}");
                </script>
                @endif
                @endforeach
                <div class="container">
                    <h6 style="text-align:center">Description</h6>
                    <p style="text-align:center"> <strong>{{$post->disc}}</strong></p>
                </div>
                <div class="container">
                    <a class="link-comment" href="{{url('/ShowPost')}}/{{$post->slug}}">
                        <p style="text-align:center;"><strong>Show comments</strong></p>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
<!-- <button id="ref_butn">Refresh the page!</button> -->









@endsection("content")