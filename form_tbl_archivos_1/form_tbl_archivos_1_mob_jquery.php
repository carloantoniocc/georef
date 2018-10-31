
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
  scEventControl_data["mapa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["arc_archivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["simbologia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["arc_comentario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tpi_codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cla_codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["arc_glosa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["arc_codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["espacio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["acceso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["usuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pasword" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["btn_login" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["mapa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mapa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["simbologia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["simbologia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["arc_comentario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["arc_comentario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tpi_codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tpi_codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cla_codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cla_codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["arc_glosa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["arc_glosa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["arc_codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["arc_codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["espacio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["espacio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acceso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acceso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pasword" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pasword" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["btn_login" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["btn_login" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tpi_codigo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cla_codigo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("arc_glosa" + iSeq == fieldName) {
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
  if ("arc_glosa" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("cla_codigo" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("pasword" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("tpi_codigo" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("usuario" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_tpi_codigo' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_tpi_codigo_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbl_archivos_1_tpi_codigo_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbl_archivos_1_tpi_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_cla_codigo' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_cla_codigo_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbl_archivos_1_cla_codigo_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbl_archivos_1_cla_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_arc_codigo' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_arc_codigo_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbl_archivos_1_arc_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_arc_glosa' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_arc_glosa_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbl_archivos_1_arc_glosa_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbl_archivos_1_arc_glosa_onfocus(this, iSeqRow) });
  $('#id_sc_field_arc_comentario' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_arc_comentario_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_tbl_archivos_1_arc_comentario_onfocus(this, iSeqRow) });
  $('#id_sc_field_arc_archivo' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_arc_archivo_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbl_archivos_1_arc_archivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_mapa' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_mapa_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbl_archivos_1_mapa_onfocus(this, iSeqRow) });
  $('#id_sc_field_simbologia' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_simbologia_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbl_archivos_1_simbologia_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_codigo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbl_archivos_1_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_usuario_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbl_archivos_1_usuario_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbl_archivos_1_usuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_pasword' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_pasword_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbl_archivos_1_pasword_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbl_archivos_1_pasword_onfocus(this, iSeqRow) });
  $('#id_sc_field_acceso' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_acceso_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbl_archivos_1_acceso_onfocus(this, iSeqRow) });
  $('#id_sc_field_btn_login' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_btn_login_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbl_archivos_1_btn_login_onfocus(this, iSeqRow) });
  $('#id_sc_field_espacio' + iSeqRow).bind('blur', function() { sc_form_tbl_archivos_1_espacio_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbl_archivos_1_espacio_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbl_archivos_1_tpi_codigo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_validate_tpi_codigo();
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_tpi_codigo_onchange(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_event_tpi_codigo_onchange();
}

function sc_form_tbl_archivos_1_tpi_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_archivos_1_cla_codigo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_validate_cla_codigo();
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_cla_codigo_onchange(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_event_cla_codigo_onchange();
}

function sc_form_tbl_archivos_1_cla_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_archivos_1_arc_codigo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_validate_arc_codigo();
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_arc_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_archivos_1_arc_glosa_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_validate_arc_glosa();
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_arc_glosa_onchange(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_event_arc_glosa_onchange();
}

function sc_form_tbl_archivos_1_arc_glosa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_archivos_1_arc_comentario_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_validate_arc_comentario();
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_arc_comentario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_archivos_1_arc_archivo_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_arc_archivo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbl_archivos_1_mapa_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_validate_mapa();
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_mapa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_archivos_1_simbologia_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_validate_simbologia();
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_simbologia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_archivos_1_codigo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_validate_codigo();
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_archivos_1_usuario_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_validate_usuario();
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_usuario_onchange(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_event_usuario_onchange();
}

function sc_form_tbl_archivos_1_usuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_archivos_1_pasword_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_validate_pasword();
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_pasword_onchange(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_event_pasword_onchange();
}

function sc_form_tbl_archivos_1_pasword_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_archivos_1_acceso_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_validate_acceso();
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_acceso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_archivos_1_btn_login_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_validate_btn_login();
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_btn_login_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_archivos_1_espacio_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_archivos_1_mob_validate_espacio();
  scCssBlur(oThis);
}

function sc_form_tbl_archivos_1_espacio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_arc_archivo" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_tbl_archivos_1_mob_ul_save.php",
    dropZone: $("#hidden_field_data_arc_archivo" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'arc_archivo'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_arc_archivo" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_arc_archivo" + iSeqRow);
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
        $("#id_img_loader_arc_archivo" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_arc_archivo" + iSeqRow).hide();
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
      $("#id_sc_field_arc_archivo" + iSeqRow).val("");
      $("#id_sc_field_arc_archivo_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_arc_archivo_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_arc_archivo = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_arc_archivo) ? "none" : "";
      $("#id_ajax_img_arc_archivo" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_arc_archivo" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_arc_archivo) {
        document.F1.temp_out_arc_archivo.value = var_ajax_img_thumb;
        document.F1.temp_out1_arc_archivo.value = var_ajax_img_arc_archivo;
      }
      else if (document.F1.temp_out_arc_archivo) {
        document.F1.temp_out_arc_archivo.value = var_ajax_img_arc_archivo;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_arc_archivo" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_arc_archivo" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_arc_archivo" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_arc_archivo" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

