const { random } = require("lodash");

$(document).ready(function(){
   $("#ButtonUpdate").click(function(){
    const answerIds = [];
    const answers = [];
    let inputs = $(".InputUpdate");
    for(let i = 0; i < inputs.length; i++){
      answerIds.push($(inputs[i]).data()['id']);
      answers.push($(inputs[i]).val());
    }
    let token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
    url: '/settings/updateQuestions',    //kérdés szövegeinek frissítését végző route
    type: 'POST',
    data: {
      'answerIds' : answerIds,        //átadjuk neki a válaszok ID-jeit és azok szövegeit
      'answers' : answers,
      '_token': token,
    },
    success: function(response)
    {
      $('#response').text(response.success+" Visszalépés a Beállítások oldalra 2 sec múlva...");
      setTimeout('location.assign("http://127.0.0.1:8000/settings")', 2000);
    },
    error: function(resopone)
    {
      $('#response').text(response.error);
    }
    });
    
  }) 
    
  $("#getRandomQuestionnaire").click(function(){
    
    let token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
    url: '/getQuestionnaires',    //kérdés szövegeinek frissítését végző route
    type: 'GET',
    data: {
      '_token': token,
    },
    success: function(response)
    {
      let kerdoivIdArr = [];
      for(let i = 0; i < response.kerdoivek.length; i++)
      {
        kerdoivIdArr.push(response.kerdoivek[i]['kerdoiv_id']);
      }
      let randNum =  response.kerdoivek[getRndInt(0,response.kerdoivek.length)]['kerdoiv_id'];
      let url = "http://127.0.0.1:8000/kitolt/"+randNum;
      window.location.href = url; 
   },
    error: function(resopone)
    {
      $('#response').text(response.error);
    }
    });
    
  })
    
    
    //Törléseket végző function-ök hívása a paramétereknek megfelelően
  $(".deleteBtn").click(function(){
    const params = $(this).data();
    const btnId = params["id"];   //törlendő kérdőív/kérdés ID-je
    const btnType = params["type"]; //megmutatja, hogy kérdőívet vagy kérdést kell törölni

    if(btnType === "questionnaire")
    {
      var token = $("meta[name='csrf-token']").attr("content");
      $.ajax({
        url: '/delete/questionnaire',   //kérdőív törlését végző route
        type: 'POST',
        data: {
          'questionnaireId' : btnId,
          '_token': token,
          },
        success: function(response)
        {
          $("#questionnaire"+btnId).remove();     //megjelenítésben lévő kérdőív sorát kitöröljük a táblázatból, ha sikeres
        }
      });
    }
    else{
      var token = $("meta[name='csrf-token']").attr("content");
      $.ajax({
      url: '/delete/question',    //kérdés törlését végző route
      type: 'POST',
      data: {
        'questionId' : btnId,
        '_token': token,
        },
      success: function(response)
      {
        $("#question"+btnId).remove();    //megjelenítésben lévő kérdés sorát kitöröljük a táblázatból, ha sikeres
      }
    });
    }
    return false;
  })
    
  //Kérdőívek illetve kérdések szövegének módosítására szolgáló megjelenítés
  $("#changerButton").click(function(){
    $("#cim").hide();
    $("#cimChanger").show();
  })
    
  //Az egyes kérdőívek kitöltéséhez szükséges link másolása a vágólapra
  $(".copyBtn").click(function(){
    var link = $(this).val();
    navigator.clipboard.writeText(link);
    console.log(link);
  })
    
  //Statiszika weboldalon megjelenő grafikonok megjelenítése
  $(".questionBtn").click(function(){
    $(".questionBtn").css({'color': 'black', "background-color": "white"});
    $(this).css({'color': '#4d2600', "background-color": "rgba(194, 194, 163,0.5)"});

    const params = $(this).data();
    let kerdesId = params['id'];
    let kerdesSzovege = $(this).text();
    console.log(kerdesSzovege);
    let token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
    url: '/getAnswers',    //kérdés válaszlehetőségeit és azokhoz tartozó információt kérjük le a route-on
    type: 'GET',
    data: {
      'kerdesId' : kerdesId,
      '_token': token,
    },
    success: function(response)
    {
      Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: kerdesSzovege
        },
        xAxis: {
            categories: [
              response.valaszok[0]['valasz'],
              response.valaszok[1]['valasz'],
              response.valaszok[2]['valasz'],
              response.valaszok[3]['valasz'],
              response.valaszok[4]['valasz']
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Válaszadók (fő)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} fő</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
          {
            name: 'Fiatal',
            
            data: [
              parseFloat(response.valaszok[0]['fiatalok']),
              parseFloat(response.valaszok[1]['fiatalok']),
              parseFloat(response.valaszok[2]['fiatalok']),
              parseFloat(response.valaszok[3]['fiatalok']),
              parseFloat(response.valaszok[4]['fiatalok'])
            ]
        },
         {
            name: 'Középkorú',
            data: [
              parseFloat(response.valaszok[0]['kozepkoruak']),
              parseFloat(response.valaszok[1]['kozepkoruak']),
              parseFloat(response.valaszok[2]['kozepkoruak']),
              parseFloat(response.valaszok[3]['kozepkoruak']),
              parseFloat(response.valaszok[4]['kozepkoruak'])
            ]
    
        },
         {
            name: 'Idős',
            data: [
              parseFloat(response.valaszok[0]['idosek']),
              parseFloat(response.valaszok[1]['idosek']),
              parseFloat(response.valaszok[2]['idosek']),
              parseFloat(response.valaszok[3]['idosek']),
              parseFloat(response.valaszok[4]['idosek'])
            ]
    
        },
         ]
    });
      
    }
    });

    token = $("meta[name='csrf-token']").attr("content2");
    $.ajax({
    url: '/getAnswers',    //kérdés válaszlehetőségeit és azokhoz tartozó információt kérjük le a route-on
    type: 'GET',
    data: {
      'kerdesId' : kerdesId,
      '_token': token,
    },
    success: function(response)
    {
      Highcharts.chart('container2', {
        chart: {
            type: 'column'
        },
        title: {
            text: kerdesSzovege
        },
        
        xAxis: {
            categories: [
              response.valaszok[0]['valasz'],
              response.valaszok[1]['valasz'],
              response.valaszok[2]['valasz'],
              response.valaszok[3]['valasz'],
              response.valaszok[4]['valasz']
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Válaszadók (fő)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} fő</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
          {
            name: 'Férfiak',
            
            data: [
              parseFloat(response.valaszok[0]['ferfi']),
              parseFloat(response.valaszok[1]['ferfi']),
              parseFloat(response.valaszok[2]['ferfi']),
              parseFloat(response.valaszok[3]['ferfi']),
              parseFloat(response.valaszok[4]['ferfi'])
            ]
        },
         {
            name: 'Nők',
            data: [
              parseFloat(response.valaszok[0]['no']),
              parseFloat(response.valaszok[1]['no']),
              parseFloat(response.valaszok[2]['no']),
              parseFloat(response.valaszok[3]['no']),
              parseFloat(response.valaszok[4]['no'])
            ]
    
        },
         {
            name: 'Egyéb',
            data: [
              parseFloat(response.valaszok[0]['egyeb']),
              parseFloat(response.valaszok[1]['egyeb']),
              parseFloat(response.valaszok[2]['egyeb']),
              parseFloat(response.valaszok[3]['egyeb']),
              parseFloat(response.valaszok[4]['egyeb'])
            ]
    
        },
         ]
    });
      
    }
    });
  })
  
})

function getRndInt(min, max){
  return Math.floor(Math.random() * (max - min) + min);
}
