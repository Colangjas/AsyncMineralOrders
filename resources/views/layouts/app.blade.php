<?php
$matnum=1;
$target=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.css') ?>">-->
    <link  rel="stylesheet" href="<?php echo asset('css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('css/trellis.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('css/styles.css') ?>">

    <!-- Styles -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <!--
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    -->


</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-side">
        <div class="container">
            <div class="navbar-header navbar navmove">
                <!-- Branding Image -->
                <div class="navtoggle" >
                    <a class="navbar-brand t-txt-h1" href="{{ url('/') }}">
                        Tegra OP S
                    </a>


                   <!-- Collapsed Hamburger -->
                  <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                       <span class="sr-only">Close</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                   </button>-->

                    <!-- Move Hamburger -->
                    <button type="button" class="move-button">
                        <span class="sr-only">Close</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

            </div>
            <div class="max-height navmove"></div>
            <div class="collapse navbar-collapse app-navbar-collapse navmove" >
                <!-- Left Side Of Navbar -->
                <!--<ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>-->

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li class="t-txt-sm">Tegra OP S</li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">Hi
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                        <li><a href="{!! url('formulations') !!}">Formulations</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    </div>
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="<?php echo asset('js/bootstrap.js') ?>"></script>
    <script src="<?php echo asset('js/trellis.js') ?>"></script>
    <script src="<?php echo asset('js/jquery.color.js') ?>"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        // Using multiple unit types within one animation.

        $( ".move-button" ).click(function() {

            $( ".navmove" ).animate({
                margin: "0 0 0 0"
            }, 300 );
            $('.row').animate({
                left: 300
            }, 300);

            $('.navmove').toggleClass('navmove-now');
            $('.row').toggleClass('row-move');

            $( ".navmove-now" ).animate({
                margin: "0 0 0 -300"
            }, 300 );
            $('.row-move').animate({
                left: 64
            }, 300);
        });

        // Toggling visibility of logout button

        $(".dropdown-toggle").click(function(){
            // alert('You have clicked your name!');
            if($(".dropdown-menu").css('visibility') == 'hidden')
                    $(".dropdown-menu").css('visibility', 'visible');
            else
                    $(".dropdown-menu").css('visibility', 'hidden');
        });

        // Formulations - add new
        var matNum = parseInt("{{ $matnum }}");
        // Add a new material
        $('#addmat').click(function(){
            var row = $('<tr class="matorder ui-sortable-handle">');

            row.append($('<td><button class="menu-btn" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button></td>'))
               .append($('<td class="orderNum"></td>'))
               .append($('<td>{!! Form::select('material', ['none' => 'select','coal' => 'Coal', 'oil' => 'Oil', 'rocksalt' => 'Rock Salt', 'gravel' => 'Gravel', 'clay' => 'Clay'], null, ['class' => 'inputnum matselect', 'id' => 'matselect0']) !!}</td>'))
               .append($('<td id="tg_'+matNum+'">{!! Form::text('target', null, array('class' => "inputnum target", 'placeholder' => '0', 'id' => 'target0')) !!}%</td>'))
               .append($('<td>{!! Form::text('ltol', null, array('class' => 'inputnum', 'placeholder' => '0', 'id' => 'ltol0')) !!}</td>'))
               .append($('<td>{!! Form::text('utol', null, array('class' => 'inputnum', 'placeholder' => '0', 'id' => 'utol0')) !!}</td>'))
               .append($('<td>{!! Form::text('solid', null, array('class' => 'inputnum', 'placeholder' => '0', 'id' => 'solid0')) !!}</td>'));

            $('.mattable tbody').append(row);
            addlistener();
            rowReorder();

            matNum++;
        });

        // Add A new test
        $('#addtest').click(function(){
            var row = $('<tr class="qualorder ui-sortable-handle">');

         row.append($('<td><button class="menu-btn" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button></td>'))
            .append($('<td class="orderNum"></td>'))
            .append($('<td>{!! Form::select('testselect', [ 'none' => 'Select', 'viscosity' => 'Viscosity', 'density' => 'Density', 'weight' => 'Weight', 'gravity' => 'Gravity',], null, ['class' => 'inputnum testselect', 'id' => 'testselect0']) !!}</td>'))
            .append($('<td>{!! Form::text('insmethod', null, array('class' => 'inputnum insmethod', 'placeholder' => 'Insert instrument method here', 'id' => 'insmethod0')) !!}</td>'))
            .append($('<td>{!! Form::text('spec', null, array('class' => 'inputnum', 'placeholder' => '0', 'id' => 'spec0')) !!}</td>'))
            .append($('<td>{!! Form::text('ltoltest', null, array('class' => 'inputnum', 'placeholder' => '0', 'id' => 'ltoltest0')) !!}</td>'))
            .append($('<td>{!! Form::text('utoltest', null, array('class' => 'inputnum', 'placeholder' => '0', 'id' => 'utoltest0')) !!}</td>'));

            $('.qualtable tbody').append(row);
            addlistener();
            rowReorder();
        });

        // Change target bar based on target %

        $(document).on('blur','.target', (function(){
            //console.log('Target blur function activated!');
            var targetAdd = 0;
            var inputNum = 0;

            // Loop through the added materials and add the target numbers
            for(var i=1; i<matNum; i++ ){
                inputNum = parseInt(Math.abs($("#tg_"+i).contents().val()));
                if($.isNumeric(inputNum)){
                targetAdd += inputNum;
                    //console.log('material loop: '+i);
                }
                //console.log('targetAdd is at: ' + targetAdd + "\n");
            }
            var bgcolor = barColour(targetAdd);
            //console.log('bgcolor is at: '+bgcolor);

            // Change the css values of the target bar
            $(".targetbar").animate({
                width: targetAdd+"%",
                backgroundColor: bgcolor
            }, 300);

            // add the % of input values added
            $(".targetbar").text(targetAdd+"%");

            subcheck();

        }));// .target blur function

        var addlistener = function(target){

            $('.menu-btn').mouseenter(function (e) {
               //console.log(e+' hamburger button hovered');
                $(this).text('Delete Row');
            });

            $('.menu-btn').mouseleave(function (e) {
                //console.log(e+' hamburger button hovered');
                $(this).html("<i class='fa fa-bars' aria-hidden='true'>");
            });

            // Button for editing
            $('.menu-btn').off('click').click(function(){
                //console.log('Hamburger button clicked!');
                var targetCur = parseInt($('.targetbar').text());
                var targetFix = targetCur - parseInt($(this).parent().parent().find('input.target').val());
                //console.log('Current target is '+targetFix);
                $(this).parent().parent().detach();
                // Change the css values of the target bar
                rowReorder();

                if(!isNaN(targetFix)) {

                    var bgcolor = barColour(targetFix);

                    $(".targetbar").animate({
                        width: targetFix + "%",
                        backgroundColor: bgcolor
                    }, 300);

                    // add the % of input values added
                    $(".targetbar").text(targetFix + "%");

                    subcheck();
                }
            });
            // Enable dragging functionality of the tr elements in the tbody for materials
            $(function() {
                $( "#matsortable" ).sortable({
                    revert: true,
                    stop: rowReorder
                });
                $( "tr, td, div" ).disableSelection();
            });

            $(function() {
                $( "#qualsortable" ).sortable({
                    revert: true,
                    stop: rowReorder
                });
                $( "tr, td, div" ).disableSelection();
            });
        };

        addlistener();

       var rowReorder = function() {
           var row = $('.matorder');
           var row2 = $('.qualorder');

           row.each(function(i, node) {
               //console.log('i is: '+i, node);
               $(this).find('.orderNum').text(i+1);
               $('.matStack').attr('value', i+1);
               $('#matselect'+i).attr('name', 'matselect'+(i+1));
               $('#matselect'+i).attr('id', 'matselect'+(i+1));
               $('#target'+i).attr('name', 'target'+(i+1));
               $('#target'+i).attr('id', 'target'+(i+1));
               $('#ltol'+i).attr('name', 'ltol'+(i+1));
               $('#ltol'+i).attr('id', 'ltol'+(i+1));
               $('#utol'+i).attr('name', 'utol'+(i+1));
               $('#utol'+i).attr('id', 'utol'+(i+1));
               $('#solid'+i).attr('name', 'solid'+(i+1));
               $('#solid'+i).attr('id', 'solid'+(i+1));
           });
           row2.each(function(i, node) {
               //console.log('i is: '+i, node);
               $(this).find('.orderNum').text(i+1);
               $('.testStack').attr('value', i+1);
               $('#testselect'+i).attr('name', 'testselect'+(i+1));
               $('#testselect'+i).attr('id', 'testselect'+(i+1));
               $('#insmethod'+i).attr('name', 'insmethod'+(i+1));
               $('#insmethod'+i).attr('id', 'insmethod'+(i+1));
               $('#spec'+i).attr('name', 'spec'+(i+1));
               $('#spec'+i).attr('id', 'spec'+(i+1));
               $('#ltoltest'+i).attr('name', 'ltoltest'+(i+1));
               $('#ltoltest'+i).attr('id', 'ltoltest'+(i+1));
               $('#utoltest'+i).attr('name', 'utoltest'+(i+1));
               $('#utoltest'+i).attr('id', 'utoltest'+(i+1));
           });
       };


        // Change the colour of the "Total Target" bar based on % displayed
        var barColour = function(colour){
            var bgcolor="";

            switch (true)
            {
                case (colour <= 25):
                    bgcolor = "#FF0003";
                    break;
                case (colour > 25 && colour <=50):
                    bgcolor = "#FFAF00";
                    break;
                case (colour > 50 && colour <=75):
                    bgcolor = "#a59b4f";
                    break;
                case (colour > 75 && colour <100):
                    bgcolor = "#889e3a";
                    break;
                case (colour >100):
                    bgcolor = "#FF0003";
                    break;

                default:
                    bgcolor = "#2ca02c";
                    break;
            }

            return bgcolor;
        };

        var subcheck = function(){
            if($('.targetbar').text() === "100%") {
                $('#submit').html('{!! Form::submit('Save') !!}');
            }else{
                $('#submit').html('<div style="border: 1px solid #FF0000; color: #ff0000; background: #d6d6d6; width: 100px; text-align: center;">Fix Target</div>');
            }
        };

    </script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>


