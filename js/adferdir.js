//Villumeðhöndlun fyrir Skráningu
$('#signup').validate({
  rules: {
    first_name:{
      required: true
    },
    last_name:{
      required: true
    },
    username:{
      required: true,
      minlength: 3
    },

    signUpPassword: {
      required: true,
      minlength: 6
    },

    confirmPassword: {
      required: true,
      equalTo: "#signUpPassword"
    }

   },
  messages: {
    first_name:{
      required: "Þú verður að skrá Fornafn"
    },
    last_name:{
      required: "Þú verður að skrá Eftirnafn"
    },
    username: {
      required: "Þú verður að velja notendanafn",
      minlength: "Notendanafnið verður að vera að minnsta 3 stafir að lengd"
    },

    signUpPassword: {
      required: "Vinsamlegast skráðu lykilorð.",
      minlength: "Lykilorðið verður að vera 6 á lengd"
    },

    confirmPassword: {
      required: "Vinsamlegast staðfestu lykilorð.",
      equalTo: "Þetta verður að vera það sama og hitt lykilorðið"
    }
  }
});
//Villumeðhöndlun fyrir nafnastillingar
$('#nameSettings').validate({
  rules: {
    change_first_name:{
      required: true
    },
    change_last_name:{
      required: true
    }
   },
  messages: {
    change_first_name:{
      required: "Þú verður að skrá Fornafn"
    },
    change_last_name:{
      required: "Þú verður að skrá Eftirnafn"
    }
  }
});
//Villumeðhöndlun fyrir nafnastillingar
$('#passwordSettings').validate({
  rules: {
    newPassword:{
      required: true,
      minlength: 6
    },
    confirmNewPassword:{
      required: true,
      equalTo: "#newPassword"
    }
   },
  messages: {
    newPassword:{
      required: "Þú verður að skrá nýtt lykilorð",
      minlength: "Lykilorðið verður að 6 stafir á lengd"
    },
    confirmNewPassword:{
      required: "Þú verður að staðfesta lykilorð",
      equalTo: "Þetta verður að vera það sama og hitt lykilorðið"
    }
  }
});

//Password strength
$('#signUpPassword').keyup(function(){
  $('#passwordS').html(checkStrength($('#signUpPassword').val()))
})  
function checkStrength(password){

    //initial strength
    var strength = 0

    //if the password length is less than 6, return message.
    if (password.length < 6) {
      $('#passwordS').removeClass()
      $('#passwordS').addClass('short')
      return 'Of stutt'
    }

    //length is ok, lets continue.

    //if length is 8 characters or more, increase strength value
    if (password.length > 7) strength += 1

    //if password contains both lower and uppercase characters, increase strength value
  if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1

    //if it has numbers and characters, increase strength value
  if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 

    //if it has one special character, increase strength value
  if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1

    //if it has two special characters, increase strength value
  if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/)) strength += 1

    //now we have calculated strength value, we can return messages

    //if value is less than 2
    if (strength < 2 ) {
      $('#passwordS').removeClass()
      $('#passwordS').addClass('weak')
      return 'Lélegt'
    } else if (strength == 2 ) {
      $('#passwordS').removeClass()
      $('#passwordS').addClass('good')
      return 'Gott'
    } else {
      $('#passwordS').removeClass()
      $('#passwordS').addClass('strong')
      return 'Mjög gott'
    }
  }//end checkstrenght


  // ajax fyrir search
  function search() {
    var query_value = $('input#search').val();
    $('b#search-string').html(query_value);
    if(query_value !== ''){
      $.ajax({
        type: "POST",
        url: "core/functions/search.php",
        data: { query: query_value },
        cache: false,
        success: function(html){
          $("ul#results").html(html);
        }
      });
    }return false;    
  }

  $("input#search").live("keyup", function(e) {
    // Timeout
    clearTimeout($.data(this, 'timer'));

    // Set Search String
    var search_string = $(this).val();

    // Do Search
    if (search_string == '') {
      $("ul#results").fadeOut();
      $('h4#results-text').fadeOut();
    }else{
      $("ul#results").fadeIn();
      $('h4#results-text').fadeIn();
      $(this).data('timer', setTimeout(search, 100));
    };
  });
// username live check
function username() {
    var query_value = $('input#username').val();
    $('span#username-result').html(query_value);
    if(query_value !== ''){
      $.ajax({
        type: "POST",
        url: "core/functions/usernameCheck.php",
        data: { query: query_value },
        cache: false,
        success: function(html){
          $("span#username-result").html(html);
        }
      });
    }return false;    
  }
// username live check
$("input#username").live("keyup", function(e) {
    // Timeout
    clearTimeout($.data(this, 'timer'));

    // Set Search String
    var search_string = $(this).val();

    // Do Search
    if (search_string == '') {
      $("span#username-result").fadeOut();
      //$('h4#results-text').fadeOut();
    }else{
      $("span#username-result").fadeIn();
      //$('h4#results-text').fadeIn();
      $(this).data('timer', setTimeout(search, 100));
    };
  });

// Rating Kerfi
$('a.rating').click(function(){
          var href=$(this).attr('href');
          var querystring=href.slice(href.indexOf('?')+1);

          $.get('core/functions/jRating.php',querystring,processResponse).error(errorResponse);
          return false;//stop the link
        });

        //Skilaboð um að þetta heppnaðist
        function processResponse(data){
          var newHTML;
          newHTML='<img src="img/check.png">';
          $('#check').html(newHTML);
          $('#check').fadeOut(3000,function() {});
          // $('#check').remove();
        }

        //Villuskilaboð
        function errorResponse() {
          var errorMsg="Your vote could not be processed right now.";
          errorMsg+="Please try again";
          $('#check').html(errorMsg);
        } 

  var form = $('form#reviewForm');
  var submit = $('#commentSubmit');

  form.on('submit', function(e) {
    // prevent default action
    e.preventDefault();
    // send ajax request
    $.ajax({
      url: 'core/functions/comment.php',
      type: 'POST',
      cache: false,
      data: form.serialize(), //form serizlize data
      beforeSend: function(){
        // change submit button value text and disabled it
        submit.val('Submitting...').attr('disabled', 'disabled');
      },
      success: function(data){
        // Append with fadeIn see http://stackoverflow.com/a/978731
        var item = $(data).hide().fadeIn(800);
        $('.comment-block').append(item);

        // reset form and button
        form.trigger('reset');
        submit.val('Submit Comment').removeAttr('disabled');
      },
      error: function(e){
        alert(e);
      }
    });
  });

// //Rating Hover System
$('a.rating').hover(function(){
  var $this = $(this), $rating = $this.parent(), index = $this.index() + 1;
  //Finna allar stjornurnar
  var images = $rating.find('img.star');
  //Taka fyrstu myndirnar að myndinni sem er verið að hovera, backa þær upp, og gera þær selectaðar
  images.slice(0,index).attr('data-backup-src',function(){
    return $(this).attr('data-backup-src') || $(this).attr('src');
  }).attr('src',function(){
    return 'img/' + $(this).attr('data-src');
  });

  //Taka myndirnar á eftir, backa þær upp og gera þær tómar
  images.slice(index, images.length).attr('data-backup-src',function(){
    return $(this).attr('data-backup-src') || $(this).attr('src');
  }).attr('src',function(){
    return 'img/' + $(this).attr('data-empty-src');
  });
},function(){
  var $this = $(this), $rating = $this.parent();
  //Vegna þess að allt á að hafa verið backað upp, þá skilum við bara því backupi. Ef ekki, þá skilum við bara source
  $rating.find('img.star').attr('src',function(){
    return $(this).attr('data-backup-src') || $(this).attr('src');
  });
});
$('a.rating').click(function(){
  var $this = $(this), $rating = $this.parent(), index = $this.index() + 1;
  //Finna allar stjornurnar
  var images = $rating.find('img.star');
  //Taka fyrstu myndirnar að myndinni sem er verið að hovera, og gera þær selectaðar, backa þær upp
  images.slice(0,index).attr('src',function(){
    return 'img/' + $(this).attr('data-src');
  }).attr('data-backup-src',function(){
    return $(this).attr('src');
  })

  //Taka myndirnar á eftir og gera þær tómar, backa þær upp 
  images.slice(index, images.length).attr('src',function(){
    return 'img/' + $(this).attr('data-empty-src');
  }).attr('data-backup-src',function(){
    return $(this).attr('src');
  });
});