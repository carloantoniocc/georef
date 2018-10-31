
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
  scEventControl_data["con_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["con_nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["con_apellido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["con_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tcc_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["con_sobre_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["comentario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["con_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["con_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["con_nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["con_nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["con_apellido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["con_apellido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["con_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["con_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tcc_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tcc_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["con_sobre_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["con_sobre_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["comentario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["comentario" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tcc_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("con_sobre_id" + iSeq == fieldName) {
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
  $('#id_sc_field_con_id' + iSeqRow).bind('blur', function() { sc_form_tbl_contacto_con_id_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbl_contacto_con_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_con_nombre' + iSeqRow).bind('blur', function() { sc_form_tbl_contacto_con_nombre_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbl_contacto_con_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_con_apellido' + iSeqRow).bind('blur', function() { sc_form_tbl_contacto_con_apellido_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbl_contacto_con_apellido_onfocus(this, iSeqRow) });
  $('#id_sc_field_con_email' + iSeqRow).bind('blur', function() { sc_form_tbl_contacto_con_email_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbl_contacto_con_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_tcc_id' + iSeqRow).bind('blur', function() { sc_form_tbl_contacto_tcc_id_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbl_contacto_tcc_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_con_sobre_id' + iSeqRow).bind('blur', function() { sc_form_tbl_contacto_con_sobre_id_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbl_contacto_con_sobre_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_comentario' + iSeqRow).bind('blur', function() { sc_form_tbl_contacto_comentario_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbl_contacto_comentario_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbl_contacto_con_id_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_contacto_validate_con_id();
  scCssBlur(oThis);
}

function sc_form_tbl_contacto_con_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_contacto_con_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_contacto_validate_con_nombre();
  scCssBlur(oThis);
}

function sc_form_tbl_contacto_con_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_contacto_con_apellido_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_contacto_validate_con_apellido();
  scCssBlur(oThis);
}

function sc_form_tbl_contacto_con_apellido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_contacto_con_email_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_contacto_validate_con_email();
  scCssBlur(oThis);
}

function sc_form_tbl_contacto_con_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_contacto_tcc_id_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_contacto_validate_tcc_id();
  scCssBlur(oThis);
}

function sc_form_tbl_contacto_tcc_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_contacto_con_sobre_id_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_contacto_validate_con_sobre_id();
  scCssBlur(oThis);
}

function sc_form_tbl_contacto_con_sobre_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbl_contacto_comentario_onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_contacto_validate_comentario();
  scCssBlur(oThis);
}

function sc_form_tbl_contacto_comentario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

