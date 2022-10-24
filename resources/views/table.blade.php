<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students PDF File</title>

    <!-- <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,700);
html {
  font-size: 62.5%;
}

body {
  font-family: 'Roboto', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 1.6rem;
  line-height: 1.6;
  color: #20262e;
  position: relative;
  background-color: #28b1de;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;

}

.container {
  max-width:100px;
  margin: auto;
  padding: 0 5%;
}

h1 {
  text-align: center;
  font-size: 3rem;
  color: rgba(255, 255, 255, .8);
  text-transform: uppercase;
  line-height: 1.375;
  margin: 0 0 2.4rem 0;
  letter-spacing: 1px
}

h2 {
  text-align: right;
  font-size: 1.2rem;
  text-transform: uppercase;
  line-height: 1.375;
  margin: 0;
  letter-spacing: 1px
}

table {
  width: 100%;
  min-width: 300px;
  margin-bottom: 2.4rem;
  background-color: #20262e;
  color: #fff;
  overflow: hidden;
}

table tr:nth-child(even) {
  background-color: rgb(46, 53, 62);
}

table th,
table td:before {
  color: #28b1de;
}

table th {
  display: none;
}

table th,
table td {
  margin: .5rem 2rem;
  text-align: left;
}

table td {
  display: block;
  font-size: 90%;
}

table td:first-child {
  padding-top: 1rem;
}

table td:last-child {
  padding-bottom: 1rem;
}

table td:before {
  content: attr(data-th) ':\00a0';
  font-weight: bold;
  min-width: 8rem;
  display: inline-block;
}

.table-2 table td:before {
  min-width: 0;
}

.table-3 table {
  background-color: rgb(46, 53, 62);
}

.table-3 table tr:nth-child(even) {
  background-color: transparent;
}

.table-3 table td:before {
  width: 100%;
  font-weight: normal;
  opacity: .8;
}

.table-3 table td {
  margin: 0;
  padding: 1.5rem 2rem 0 2rem;
  font-weight: bold
}

.table-3 table tr td:first-child {
  background-color: #20262e;
  padding-top: 1.5rem;
  padding-bottom: 1.5rem;
}

.table-3 table tr td:last-child {
  padding-bottom: 1.5rem;
  border-bottom: 4px solid rgba(255, 255, 255, .3)
}

.table-3 table tr:last-child td:last-child {
  border-bottom: none;
}

@media (min-width: 600px) {
  table td:before {
    display: none;
  }
  table th,
  table td {
    display: table-cell;
  }
  table th,
  table td,
  table td:first-child,
  table td:last-child {
    padding: 1.5rem 2rem;
  }
  .table-3 table {
    background-color: #20262e;
  }
  .table-3 table tr:nth-child(even) {
    background-color: rgb(46, 53, 62);
  }
  .table-3 table td {
    margin: .5rem 2rem;
    padding: 1.5rem 2rem;
    font-weight: normal
  }
  .table-3 table tr td:first-child {
    background-color: transparent;
  }
  .table-3 table tr td:last-child {
    border-bottom: none;
  }
}
    </style> -->

</head>
<body>

<div class="container">
  <h1>Student Applicants</h1>
  
  <div class="table-2">
    
    <table>
      <tbody>
        <tr>
          <th>Name</th>
          <th>M.I.</th>
          <th>Gender</th>
          <th>Birthday</th>
          <th>Birthplace.</th>
          <th>Contact #</th>
          <th>Address</th>
          <th>Email</th>
          <th>Password</th>
        </tr>

       @foreach($data as $item)
        <tr>
          <td data-th="Element">{{$item->name}}</td>
          <td data-th="Element">{{$item->mname}}</td>
          <td data-th="Element">{{$item->gender}}</td>
          <td data-th="Element">{{$item->bday}}</td>
          <td data-th="Element">{{$item->bplace}}</td>
          <td data-th="Element">{{$item->contact}}</td>
          <td data-th="Element">{{$item->address}}</td>
          <td data-th="Element">{{$item->email}}</td>
          <td data-th="Element">{{$item->password}}</td> 
        </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
  
</div>

</body>
</html>