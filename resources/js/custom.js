if(document.getElementById("show_avail_cars")){
  document.getElementById("show_avail_cars").setAttribute("hidden", ""); 
}

function loop_data(data){
  data.forEach(element => {
    $('#ajax_list').append(`
    <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Code</th>
        <th scope="col">Name</th>
        <th scope="col">Stock</th>
        <th scope="col">Purchase Price</th>
        <th scope="col">Rent Price</th>
        <th scope="col">Avail</th>
        <th scope="col" class="text-center">Action</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">${element.id}</th>
        <td>${element.code}</td>
        <td>${element.name}</td>
        <td>${element.stock}</td>
        <td>${element.purchase_price}</td>
        <td>${element.rent}</td>
        <th scope="row">
                      ${element.avail == '1' ? '<span class="bg-primary p-2 text-white">Yes</span>' : '<span class="bg-danger p-2 text-white">No</span>'}
                    </th>
        <td>
            <a href="http://localhost:8000/delete/`+ element.id + `" class="btn btn-danger btn-sm">Delete</a>
            <a href="http://localhost:8000/cars/edit/`+ element.id + `" class="btn btn-primary btn-sm">Edit</a>
        </td>
      </tr>
    </tbody>
  </table>
    `);
    
});
}


$(document).ready(function(){
    $(search_input).keyup(function(){
      document.getElementById("show_avail_cars").removeAttribute("hidden");
        var query = $(this).val();
        // console.log(query);
        $.ajax({
            type: 'get',
            url: '/cars/search',
            data: {'query': query},
            datatype: 'json',
            success: function(data){
                $(total_cars).text(`Total ${Object.values(data.total_cars).flat()[0].total_cars} are there`);    
                $('#ajax_list').html('');
                loop_data(data.result);
                if($(search_input).val() == ""){
                    $('#ajax_list').html('');
                    $(total_cars).text("");
                    document.getElementById("show_avail_cars").setAttribute("hidden", "");
                }
            }
        })
    })
    
})

$(show_avail_cars).on('click', function(e){
  e.preventDefault();
  carName = $(search_input).val();
  $.ajax({
    url: '/showAvailCars',
    type: 'get',
    data: {'carName': carName},
    datatype: 'json',
    success: function(data){
      console.log(data);
      $('#ajax_list').html('');
      loop_data(data);
    if($(search_input).val() == ""){
        $('#ajax_list').html('');
    }
    }
  })
})

// $(ajax_list).on('click', 'a', function(e){
//     e.preventDefault();
//     var id = $(this).data('id');
//     $.ajax({
//         url: '/cars/show/' + id,
//         type: 'get',
//         success: function(data){
//             console.log(data);
//             // $(ajax_list).append(
                
//             // );
//             // alert(`${data.forEach(s_data => {
//             //     `<h1>${s_data.name}<h1>`
//             // })}`)
//         },
//         error: function(xhr){
//             console.log(xhr.responseText);
//         }      
//     })
// })

function renderChart(chartData){
  var ctx = $(chartContainer);
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ["Available Cars", "Un-Available Cars"],
      datasets: [{
          label: 'Cars Availability Details',
          data: chartData,
          backgroundColor: [
            'rgba(0, 128, 0, 0.5)',
            'rgba(255, 0, 0, 0.5)',
          ],
      }]
    }
  });
}

$(document).ready(function(){
  $.ajax({
    url: '/displayChart',
    type: 'get',
    success: function(data){
      var data_array = Object.values(data).flat();
      renderChart([data_array[0].available, data_array[1].unavailable])
    }
  })
})