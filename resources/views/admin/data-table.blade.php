@extends('admin.master')
@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Contents</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Process</th>
                                <th>Reference</th>
                                <th>Country</th>
                                <th>Email</th>
                                <th>Payment</th>
                                <th>Apply Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>dd2d@ggg.com</td>
                                <td>$32,800</td>
                                <td>27-Jan-2020 7:04PM</td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Airi Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Brielle Williamson</td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>Rhona Davidson</td>
                                <td>Integration Specialist</td>
                                <td>Tokyo</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Colleen Hurst</td>
                                <td>Javascript Developer</td>
                                <td>San Francisco</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Sonya Frost</td>
                                <td>Software Engineer</td>
                                <td>Edinburgh</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Jena Gaines</td>
                                <td>Office Manager</td>
                                <td>London</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Quinn Flynn</td>
                                <td>Support Lead</td>
                                <td>Edinburgh</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Charde Marshall</td>
                                <td>Regional Director</td>
                                <td>San Francisco</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Haley Kennedy</td>
                                <td>Senior Marketing Designer</td>
                                <td>London</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Tatyana Fitzpatrick</td>
                                <td>Regional Director</td>
                                <td>London</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Michael Silva</td>
                                <td>Marketing Designer</td>
                                <td>London</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>Paul Byrd</td>
                                <td>Chief Financial Officer (CFO)</td>
                                <td>New York</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>Gloria Little</td>
                                <td>Systems Administrator</td>
                                <td>New York</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td>Bradley Greer</td>
                                <td>Software Engineer</td>
                                <td>London</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td>Dai Rios</td>
                                <td>Personnel Lead</td>
                                <td>Edinburgh</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>Jenette Caldwell</td>
                                <td>Development Lead</td>
                                <td>New York</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>19</td>
                                <td>Yuri Berry</td>
                                <td>Chief Marketing Officer (CMO)</td>
                                <td>New York</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td>Caesar Vance</td>
                                <td>Pre-Sales Support</td>
                                <td>New York</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>21</td>
                                <td>Doris Wilder</td>
                                <td>Sales Assistant</td>
                                <td>Sidney</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>22</td>
                                <td>Angelica Ramos</td>
                                <td>Chief Executive Officer (CEO)</td>
                                <td>London</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>23</td>
                                <td>Gavin Joyce</td>
                                <td>Developer</td>
                                <td>Edinburgh</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>24</td>
                                <td>Jennifer Chang</td>
                                <td>Regional Director</td>
                                <td>Singapore</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>25</td>
                                <td>Brenden Wagner</td>
                                <td>Software Engineer</td>
                                <td>San Francisco</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>26</td>
                                <td>Fiona Green</td>
                                <td>Chief Operating Officer (COO)</td>
                                <td>San Francisco</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>27</td>
                                <td>Shou Itou</td>
                                <td>Regional Marketing</td>
                                <td>Tokyo</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>28</td>
                                <td>Michelle House</td>
                                <td>Integration Specialist</td>
                                <td>Sidney</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>29</td>
                                <td>Suki Burks</td>
                                <td>Developer</td>
                                <td>London</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>30</td>
                                <td>Prescott Bartlett</td>
                                <td>Technical Author</td>
                                <td>London</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>31</td>
                                <td>Gavin Cortez</td>
                                <td>Team Leader</td>
                                <td>San Francisco</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>32</td>
                                <td>Martena Mccray</td>
                                <td>Post-Sales support</td>
                                <td>Edinburgh</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>
                            <tr>
                                <td>33</td>
                                <td>Unity Butler</td>
                                <td>Marketing Designer</td>
                                <td>San Francisco</td>
                                <td>ddd@ggg.com</td>
                                <td>$320,800</td>
                                <td>28-Jan-2020 7:04PM</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><



@endsection
