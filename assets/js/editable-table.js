var EditableTable = function () {

    return {

        //main function to initiate the module
        init: function () {
            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }

                oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = '<input type="text" class="form-control small" value="' + aData[0] + '">';
                jqTds[1].innerHTML = '<input type="text" class="form-control small" value="' + aData[1] + '">';
                jqTds[2].innerHTML = '<input type="text" class="form-control small" value="' + aData[2] + '">';
                jqTds[3].innerHTML = '<input type="text" class="form-control small" value="' + aData[3] + '">';
                jqTds[4].innerHTML = '<a class="edit" href="">Save</a>';
                jqTds[5].innerHTML = '<a class="cancel" href="">Cancel</a>';
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
                oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 5, false);
                oTable.fnDraw();
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
                oTable.fnDraw();
            }

            var oTable = $('#editable-sample').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('#editable-sample_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
            jQuery('#editable-sample_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown
			
			function restoreRow1(oTable1, nRow) {
                var aData = oTable1.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable2.fnUpdate(aData[i], nRow, i, false);
                }

                oTable1.fnDraw();
            }

            function editRow1(oTable1, nRow) {
                var aData = oTable1.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = '<input type="text" class="form-control small" value="' + aData[0] + '">';
                jqTds[1].innerHTML = '<input type="text" class="form-control small" value="' + aData[1] + '">';
                jqTds[2].innerHTML = '<input type="text" class="form-control small" value="' + aData[2] + '">';
                jqTds[3].innerHTML = '<input type="text" class="form-control small" value="' + aData[3] + '">';
                jqTds[4].innerHTML = '<a class="edit" href="">Save</a>';
                jqTds[5].innerHTML = '<a class="cancel" href="">Cancel</a>';
            }

            function saveRow1(oTable1, nRow) {
                var jqInputs = $('input', nRow);
                oTable2.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable2.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable2.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable2.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable2.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
                oTable2.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 5, false);
                oTable2.fnDraw();
            }

            function cancelEditRow1(oTable1, nRow) {
                var jqInputs = $('input', nRow);
                oTable2.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable2.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable2.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable2.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable2.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
                oTable2.fnDraw();
            }

            var oTable1 = $('#editable-sample1').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('#editable-sample1_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
            jQuery('#editable-sample1_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

            function restoreRow2(oTable2, nRow) {
                var aData = oTable2.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable2.fnUpdate(aData[i], nRow, i, false);
                }

                oTable2.fnDraw();
            }

            function editRow2(oTable2, nRow) {
                var aData = oTable2.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = '<input type="text" class="form-control small" value="' + aData[0] + '">';
                jqTds[1].innerHTML = '<input type="text" class="form-control small" value="' + aData[1] + '">';
                jqTds[2].innerHTML = '<input type="text" class="form-control small" value="' + aData[2] + '">';
                jqTds[3].innerHTML = '<input type="text" class="form-control small" value="' + aData[3] + '">';
                jqTds[4].innerHTML = '<a class="edit" href="">Save</a>';
                jqTds[5].innerHTML = '<a class="cancel" href="">Cancel</a>';
            }

            function saveRow2(oTable2, nRow) {
                var jqInputs = $('input', nRow);
                oTable2.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable2.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable2.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable2.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable2.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
                oTable2.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 5, false);
                oTable2.fnDraw();
            }

            function cancelEditRow2(oTable2, nRow) {
                var jqInputs = $('input', nRow);
                oTable2.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable2.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable2.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable2.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable2.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
                oTable2.fnDraw();
            }

            var oTable2 = $('#editable-sample2').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('#editable-sample2_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
            jQuery('#editable-sample2_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

function restoreRow3(oTable3, nRow) {
                var aData = oTable3.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable3.fnUpdate(aData[i], nRow, i, false);
                }

                oTable3.fnDraw();
            }

            function editRow3(oTable3, nRow) {
                var aData = oTable3.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = '<input type="text" class="form-control small" value="' + aData[0] + '">';
                jqTds[1].innerHTML = '<input type="text" class="form-control small" value="' + aData[1] + '">';
                jqTds[2].innerHTML = '<input type="text" class="form-control small" value="' + aData[2] + '">';
                jqTds[3].innerHTML = '<input type="text" class="form-control small" value="' + aData[3] + '">';
                jqTds[4].innerHTML = '<a class="edit" href="">Save</a>';
                jqTds[5].innerHTML = '<a class="cancel" href="">Cancel</a>';
            }

            function saveRow3(oTable3, nRow) {
                var jqInputs = $('input', nRow);
                oTable3.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable3.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable3.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable3.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable3.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
                oTable3.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 5, false);
                oTable3.fnDraw();
            }

            function cancelEditRow3(oTable3, nRow) {
                var jqInputs = $('input', nRow);
                oTable3.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable3.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable3.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable3.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable3.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
                oTable3.fnDraw();
            }

            var oTable3 = $('#editable-sample3').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('#editable-sample3_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
            jQuery('#editable-sample3_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown


            var nEditing = null;

            $('#editable-sample_new').click(function (e) {
                e.preventDefault();
                var aiNew = oTable.fnAddData(['', '', '', '',
                        '<a class="edit" href="">Edit</a>', '<a class="cancel" data-mode="new" href="">Cancel</a>'
                ]);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#editable-sample a.delete').live('click', function (e) {
                e.preventDefault();

                if (confirm("Are you sure to delete this row ?") == false) {
                    return;
                }

                var nRow = $(this).parents('tr')[0];
                oTable.fnDeleteRow(nRow);
                alert("Deleted! Do not forget to do some ajax to sync with backend :)");
            });

            $('#editable-sample a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#editable-sample a.edit').live('click', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow && this.innerHTML == "Save") {
                    /* Editing this row and want to save it */
                    saveRow(oTable, nEditing);
                    nEditing = null;
                    alert("Updated! Do not forget to do some ajax to sync with backend :)");
                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
        }

    };

}();
