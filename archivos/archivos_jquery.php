
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('input:radio.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && $("#id_ac_" + sField).length > 0) {
    if (false == scSetFocusOnField($("#id_ac_" + sField))) {
      setTimeout(function () { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["tpi_codigo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cla_codigo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["arc_codigo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["arc_glosa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["arc_comentario_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["arc_archivo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tpi_codigo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tpi_codigo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cla_codigo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cla_codigo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["arc_codigo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["arc_codigo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["arc_glosa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["arc_glosa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["arc_comentario_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["arc_comentario_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tpi_codigo_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cla_codigo_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onChange_call(sFieldName, iFieldSeq) {
  var oField, fieldId, fieldName;
  oField = $("#id_sc_field_" + sFieldName + iFieldSeq);
  fieldId = oField.attr("id");
  fieldName = fieldId.substr(12);
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_tpi_codigo_' + iSeqRow).bind('blur', function() { sc_archivos_tpi_codigo__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_archivos_tpi_codigo__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_archivos_tpi_codigo__onfocus(this, iSeqRow) });
  $('#id_sc_field_cla_codigo_' + iSeqRow).bind('blur', function() { sc_archivos_cla_codigo__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_archivos_cla_codigo__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_archivos_cla_codigo__onfocus(this, iSeqRow) });
  $('#id_sc_field_arc_codigo_' + iSeqRow).bind('blur', function() { sc_archivos_arc_codigo__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_archivos_arc_codigo__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_archivos_arc_codigo__onfocus(this, iSeqRow) });
  $('#id_sc_field_arc_glosa_' + iSeqRow).bind('blur', function() { sc_archivos_arc_glosa__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_archivos_arc_glosa__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_archivos_arc_glosa__onfocus(this, iSeqRow) });
  $('#id_sc_field_arc_comentario_' + iSeqRow).bind('blur', function() { sc_archivos_arc_comentario__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_archivos_arc_comentario__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_archivos_arc_comentario__onfocus(this, iSeqRow) });
  $('#id_sc_field_arc_archivo_' + iSeqRow).bind('blur', function() { sc_archivos_arc_archivo__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_archivos_arc_archivo__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_archivos_arc_archivo__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_archivos_tpi_codigo__onblur(oThis, iSeqRow) {
  do_ajax_archivos_validate_tpi_codigo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_archivos_tpi_codigo__onchange(oThis, iSeqRow) {
  do_ajax_archivos_refresh_tpi_codigo_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_archivos_tpi_codigo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_archivos_cla_codigo__onblur(oThis, iSeqRow) {
  do_ajax_archivos_validate_cla_codigo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_archivos_cla_codigo__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_archivos_cla_codigo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_archivos_arc_codigo__onblur(oThis, iSeqRow) {
  do_ajax_archivos_validate_arc_codigo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_archivos_arc_codigo__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_archivos_arc_codigo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_archivos_arc_glosa__onblur(oThis, iSeqRow) {
  do_ajax_archivos_validate_arc_glosa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_archivos_arc_glosa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_archivos_arc_glosa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_archivos_arc_comentario__onblur(oThis, iSeqRow) {
  do_ajax_archivos_validate_arc_comentario_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_archivos_arc_comentario__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_archivos_arc_comentario__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_archivos_arc_archivo__onblur(oThis, iSeqRow) {
  scCssBlur(oThis, iSeqRow);
}

function sc_archivos_arc_archivo__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_archivos_arc_archivo__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_arc_archivo_" + iSeqRow).fileupload({
    datatype: "json",
    url: "archivos_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'arc_archivo_'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_arc_archivo_" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_arc_archivo_" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_arc_archivo_" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_arc_archivo_" + iSeqRow).hide();
      }
      if (fileData && fileData[0] && fileData[0].error && "acceptFileTypes" == fileData[0].error) {
        oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl']; ?>"};
        scAjaxShowDebug(oTemp);
        return;
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      $("#id_sc_field_arc_archivo_" + iSeqRow).val("");
      $("#id_sc_field_arc_archivo__ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_arc_archivo__ul_type" + iSeqRow).val(fileData[0].type);
      eval("var_ajax_img_arc_archivo_" + iSeqRow + " = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source");
      var_ajax_img_arc_archivo_ = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_arc_archivo_) ? "none" : "";
      $("#id_ajax_img_arc_archivo_" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_arc_archivo_" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_arc_archivo_) {
        document.F1.temp_out_arc_archivo_.value = var_ajax_img_thumb;
        document.F1.temp_out1_arc_archivo_.value = var_ajax_img_arc_archivo_;
      }
      else if (document.F1.temp_out_arc_archivo_) {
        document.F1.temp_out_arc_archivo_.value = var_ajax_img_arc_archivo_;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_arc_archivo_" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_arc_archivo_" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_arc_archivo_" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_arc_archivo_" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd
