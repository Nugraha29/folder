@if(Auth::user()->status == "menunggu")
 
@else
<footer class="footer">
  <div class="container-fluid">
    <nav class="float-left">
      <ul>
        <li>
          <a href="#">
              {{ __('DINAS LINGKUNGAN HIDUP') }}
          </a>
        </li>
      </ul>
    </nav>
    <div class="copyright float-right">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script> by
      <a href="https://www.himagrib.co.id target="_blank">HIMAGRIB</a>.
    </div>
  </div>
</footer>
@endif