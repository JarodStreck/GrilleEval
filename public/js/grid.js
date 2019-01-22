var tbl = document.getElementById("gridtable");

    if (tbl != null) {

        for (var i = 0; i < tbl.rows.length; i++) {

            for (var j = 0; j < tbl.rows[i].cells.length; j++)

                tbl.rows[i].cells[j].addEventListener("click", function() {
                  console.log(this);
                });

        }
    }
