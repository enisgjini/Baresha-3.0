<?php
include 'partials/header.php';
if (isset($_POST['ruaj'])) {
  $kategoria = mysqli_real_escape_string($conn, $_POST['kategoria']);
  $conn->query("INSERT INTO kategorit (kategorit) VALUES ('$kategoria')");
} else {
  echo $conn->error;
}
if (isset($_GET['delete'])) {
  $delid = $_GET['delete'];
  $conn->query("DELETE FROM kategorit WHERE id='$delid'");
  echo "<script>alert('Kategoria eshte fshire me sukses!')</script>";
}
?>


<style>
  #search-result {
    color: blue;
  }

  #search-button {
    width: 100;
  }

  #search-result::before {
    content: "...";
    animation: typing 2s infinite;
  }

  #conversation-history {
    overflow-y: scroll;
    max-height: 300px;
    border: 1px solid #ccc;
    padding: 10px;
    display: flex;
    flex-wrap: wrap;
    align-content: flex-start;

  }


  @keyframes typing {
    0% {
      width: 0;
    }

    50% {
      width: 10px;
    }

    100% {
      width: 0;
    }
  }
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shto nj&euml; kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body my-3">
        <form method="POST" action="">
          <input type="text" name="kategoria" class="form-control" placeholder="Em&euml;rtimi i kategoris">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbylle</button>
        <button type="submit" class="btn btn-primary" name="ruaj">Ruaje</button>
        </form>
      </div>
    </div>
  </div>
</div>




<div class="main-panel">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="container">

        <div class="p-5 bg-light mb-4 card">
          <h4 class="font-weight-bold text-gray-800 mb-4">Lista e klientëve tjerë</h4>
          <nav class="d-flex">
            <h6 class="mb-0">
              <a href="" class="text-reset">Klientët</a>
              <span>/</span>
              <a href="klient.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Lista e klientëve</u></a>
            </h6>
          </nav>
        </div>



        <div class="row mx-auto gap-5 my-3">
          <div class="col card p-5">
            <img src="images/chatGPT-logo.png" alt="" width="25%" class="rounded-5 mx-auto">
            <br>
            <h4 class="font-weight-bold text-gray-800 mb-4 text-center">ChatGPT</h4>
            <br>
            <input type="text" id="search-input" class="form-control form-control-lg shadow-3">
            <br>
            <div class="d-flex justify-content-between">


              <button id="search-button" class="btn btn-light shadow-3 border"><i class="fi fi-rr-search"></i></button>

              <button id="stop-button" class="btn btn-light shadow-3 border "><i class="fi fi-rr-ban"></i></button>
              <button id="clear-button" class="btn btn-light shadow-3 border"><i class="fi fi-rr-broom"></i></button>
              <button class="btn btn-light shadow-3 border" id="button1"><i class="fi fi-rr-info"></i></button>
            </div>
            <br>
            <div class="alert alert-light shadow-3 border alert-dismissable">
              Perdore ChatGPT-në per gjenerimin e kategorive (Si ne rastin)
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
          <div class="col card">
            <h5 class="my-3">Përgjigjet nga ChatGPT</h5>
            <br>
            <textarea id="search-result" class="form-control shadow-3"></textarea>
          </div>
        </div>




        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="example" class="table w-100 responsive">
                    <thead>
                      <tr>
                        <th>Emertimi</th>
                        <th>Modifiko</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Emertimi</th>
                        <th>Modifiko</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $kueri = $conn->query("SELECT * FROM kategorit");
                      while ($k = mysqli_fetch_array($kueri)) {

                      ?>
                        <tr>
                          <td><?php echo $k['kategorit']; ?></td>
                          <td style="width: 20%;" class="mx-auto text-center"><a class="btn btn-danger" href="kategorit.php?delete=<?php echo $k['id']; ?>"><i class="fi fi-rr-trash"></i></a></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'partials/footer.php'; ?>
<script>
  $('#example').DataTable({
    responsive: true,
    search: {
      return: true,
    },
    dom: 'Bfrtip',
    buttons: [{
      text: '<i class="fi fi-rr-user-add fa-lg"></i>&nbsp;&nbsp; Shto kategori',
      className: 'btn btn-light border shadow-2 me-2',
      action: function(e, node, config) {
        $('#exampleModal').modal('show')
      }
    }, ],
    initComplete: function() {
      var btns = $('.dt-buttons');
      btns.addClass('');
      btns.removeClass('dt-buttons btn-group');

    },
    fixedHeader: true,
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.13.1/i18n/sq.json",
    },

  })
</script>
<script>
  let isRunning = true;

  const searchButton = document.getElementById("search-button");
  const searchInput = document.getElementById("search-input");
  const searchResult = document.getElementById("search-result");
  let currentIndex = 0;
  const apiKey = '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';

  function type() {
    if (currentIndex < response.length && isRunning) {
      searchResult.innerHTML += response[currentIndex];
      currentIndex++;
      setTimeout(type, 100);
    } else {
      6
      clearInterval();
    }
  }


  searchButton.addEventListener("click", function() {
    const userInput = searchInput.value;

    if (userInput.trim() === "") {
      alert("Please enter a query to search");
      return;
    }
    searchResult.innerHTML = "Loading...";
    search(userInput)
      .then((result) => {
        response = result;
        type();
      })
      .catch((error) => {
        searchResult.innerHTML = "Error: " + error;
      });
  });

  async function search(query) {
    const response = await fetch('https://api.openai.com/v1/engines/text-davinci-003/completions', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${apiKey}`
      },
      body: JSON.stringify({
        prompt: query,
        max_tokens: 100
      })
    });
    if (!response.ok) {
      throw new Error(response.statusText);
    }
    const data = await response.json();
    return data.choices[0].text;
  }

  const stopButton = document.getElementById("stop-button");
  stopButton.addEventListener("click", function() {
    isRunning = false;
  });

  const clearButton = document.getElementById("clear-button");
  clearButton.addEventListener("click", function() {
    localStorage.clear();
    searchInput.value = "";
    searchResult.innerHTML = "";
    isRunning = false;
  });




  function addToConversationHistory(message) {
    const history = document.getElementById("conversation-history");
    const p = document.createElement("p");
    p.innerText = message;
    history.appendChild(p);
  }
  searchButton.addEventListener("click", function() {
    const userInput = searchInput.value;
    addToConversationHistory("User: " + userInput);
    search(userInput)
      .then((result) => {
        response = result;
        addToConversationHistory("ChatGPT: " + response);
        type();
      })
      .catch((error) => {
        searchResult.innerHTML = "Error: " + error;
      });
  });
</script>
<script>
  $(document).ready(function() {
    $('#button1').click(function() {
      $('.alert').show()
    })
  });
</script>