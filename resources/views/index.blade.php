<!DOCTYPE html>
<html lang="en">

<head>
  <title>demo</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
  @if (\Session::has('message'))
  <div class="alert alert-success">
    <p>{{ \Session::get('message') }}</p>
  </div>
  @endif
  @if (\Session::has('success'))
  <div class="alert alert-success">
    <p>{{ \Session::get('success') }}</p>
  </div>
  @endif
  <div class="container">
    <form action="{{ route('export_excel') }}" method="get">
    <button  class="btn btn-primary" name="export" value="excel"> Excel export </button>
    <button  class="btn btn-primary" name="export" value="pdf"> Pdf export </button>


    
    <!-- <a href="{{ route('export_excel') }}" class="btn btn-primary"> Excel export </a> -->
    <!-- <a href="{{route('export_pdf')}}" class="btn btn-primary"> Pdf export</a> -->

    <!-- <a href="{{route('export_pdf')}}" class="btn btn-primary">view pdf</a>             -->
    <a href="{{route('products.create')}}" class="btn btn-primary">add product</a>
    <div class="col-md-6 mt-2 input-group mb-3">
      <input type="text" class="form-control" id="searchname" name="searchname" placeholder="name" aria-describedby="basic-addon2">
      <input type="text" class="form-control" id="searchprice" name="searchprice" placeholder="price" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="searchbtn btn btn-outline-secondary" type="button">search</button>
        <button class="clearbtn btn btn-outline-secondary" type="button">clear</button>
      </div>

    </div>
    </form>
  </div>
  <table class="table" id="table">
    <thead>

      <tr>
        <!-- <th scope="col">#</th> -->
        <th scope="col">name</th>
        <th scope="col">price</th>
        <th scope="col">description</th>
        <th scope="col">image</th>
        <th scope="col">action</th>
      </tr>
    </thead>

  </table>
  </div>

</body>
<script type="text/javascript">
  $(function() {
    var table = $('.table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{ route('products.index') }}",
        data: function(d) {
          d.searchname = $('#searchname').val();
          d.searchprice = $('#searchprice').val();

        }
      },

      columns: [
        // {data: 'DT_RowIndex'},
        {
          data: 'name',
          name: 'name'
        },
        {
          data: 'price',
          name: 'price'
        },
        {
          data: 'description',
          name: 'desription'
        },
        {
          data: 'image',
          name: 'image'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ]
    });
    $(".searchbtn").click(function() {
      table.draw();
    });
    $(".clearbtn").click(function() {
      $('#searchname').val('');
      $('#searchprice').val('');
      table.draw();
    });
  });
</script>

</html>
<script>
  $(document).ready(function() {
    $('#table').DataTable();
  });
</script>