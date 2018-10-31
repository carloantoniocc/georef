<?php
//
class form_tbl_archivos_1_mob_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'         => '',
                                'param'          => array(),
                                'autoComp'       => '',
                                'rsSize'         => '',
                                'msgDisplay'     => '',
                                'errList'        => array(),
                                'fldList'        => array(),
                                'focus'          => '',
                                'navStatus'      => array(),
                                'redir'          => array(),
                                'blockDisplay'   => array(),
                                'fieldDisplay'   => array(),
                                'fieldLabel'     => array(),
                                'readOnly'       => array(),
                                'btnVars'        => array(),
                                'ajaxAlert'      => '',
                                'ajaxMessage'    => '',
                                'ajaxJavascript' => array(),
                                'buttonDisplay'  => array(),
                                'calendarReload' => false,
                                'quickSearchRes' => false,
                                'displayMsg'     => false,
                                'displayMsgTxt'  => '',
                                'dyn_search'     => array(),
                                'empty_filter'   => '',
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $tpi_codigo;
   var $tpi_codigo_1;
   var $cla_codigo;
   var $cla_codigo_1;
   var $arc_codigo;
   var $arc_glosa;
   var $arc_glosa_1;
   var $arc_comentario;
   var $arc_archivo;
   var $arc_archivo_scfile_name;
   var $arc_archivo_ul_name;
   var $arc_archivo_scfile_type;
   var $arc_archivo_ul_type;
   var $arc_archivo_limpa;
   var $arc_archivo_salva;
   var $out_arc_archivo;
   var $out1_arc_archivo;
   var $mapa;
   var $simbologia;
   var $codigo;
   var $usuario;
   var $pasword;
   var $acceso;
   var $btn_login;
   var $espacio;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['acceso']))
          {
              $this->acceso = $this->NM_ajax_info['param']['acceso'];
          }
          if (isset($this->NM_ajax_info['param']['arc_archivo']))
          {
              $this->arc_archivo = $this->NM_ajax_info['param']['arc_archivo'];
          }
          if (isset($this->NM_ajax_info['param']['arc_archivo_limpa']))
          {
              $this->arc_archivo_limpa = $this->NM_ajax_info['param']['arc_archivo_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['arc_archivo_ul_name']))
          {
              $this->arc_archivo_ul_name = $this->NM_ajax_info['param']['arc_archivo_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['arc_archivo_ul_type']))
          {
              $this->arc_archivo_ul_type = $this->NM_ajax_info['param']['arc_archivo_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['arc_codigo']))
          {
              $this->arc_codigo = $this->NM_ajax_info['param']['arc_codigo'];
          }
          if (isset($this->NM_ajax_info['param']['arc_comentario']))
          {
              $this->arc_comentario = $this->NM_ajax_info['param']['arc_comentario'];
          }
          if (isset($this->NM_ajax_info['param']['arc_glosa']))
          {
              $this->arc_glosa = $this->NM_ajax_info['param']['arc_glosa'];
          }
          if (isset($this->NM_ajax_info['param']['btn_login']))
          {
              $this->btn_login = $this->NM_ajax_info['param']['btn_login'];
          }
          if (isset($this->NM_ajax_info['param']['cla_codigo']))
          {
              $this->cla_codigo = $this->NM_ajax_info['param']['cla_codigo'];
          }
          if (isset($this->NM_ajax_info['param']['codigo']))
          {
              $this->codigo = $this->NM_ajax_info['param']['codigo'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['espacio']))
          {
              $this->espacio = $this->NM_ajax_info['param']['espacio'];
          }
          if (isset($this->NM_ajax_info['param']['mapa']))
          {
              $this->mapa = $this->NM_ajax_info['param']['mapa'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
          {
              $this->nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['pasword']))
          {
              $this->pasword = $this->NM_ajax_info['param']['pasword'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['simbologia']))
          {
              $this->simbologia = $this->NM_ajax_info['param']['simbologia'];
          }
          if (isset($this->NM_ajax_info['param']['tpi_codigo']))
          {
              $this->tpi_codigo = $this->NM_ajax_info['param']['tpi_codigo'];
          }
          if (isset($this->NM_ajax_info['param']['usuario']))
          {
              $this->usuario = $this->NM_ajax_info['param']['usuario'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->codigo_archivo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['codigo_archivo'] = $this->codigo_archivo;
      }
      if (isset($this->pass) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['pass'] = $this->pass;
      }
      if (isset($this->user) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['user'] = $this->user;
      }
      if (isset($_POST["pass"])) 
      {
          $_SESSION['pass'] = $this->pass;
      }
      if (isset($_POST["user"])) 
      {
          $_SESSION['user'] = $this->user;
      }
      if (isset($_GET["codigo_archivo"])) 
      {
          $_SESSION['codigo_archivo'] = $this->codigo_archivo;
      }
      if (isset($_GET["pass"])) 
      {
          $_SESSION['pass'] = $this->pass;
      }
      if (isset($_GET["user"])) 
      {
          $_SESSION['user'] = $this->user;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_tbl_archivos_1_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->codigo_archivo)) 
          {
              $_SESSION['codigo_archivo'] = $this->codigo_archivo;
          }
          if (isset($this->pass)) 
          {
              $_SESSION['pass'] = $this->pass;
          }
          if (isset($this->user)) 
          {
              $_SESSION['user'] = $this->user;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->codigo_archivo)) 
          {
              $_SESSION['codigo_archivo'] = $this->codigo_archivo;
          }
          if (isset($this->pass)) 
          {
              $_SESSION['pass'] = $this->pass;
          }
          if (isset($this->user)) 
          {
              $_SESSION['user'] = $this->user;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_tbl_archivos_1_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['initialize'])
          {
              $_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_arc_archivo = $this->arc_archivo;
    $original_mapa = $this->mapa;
    $original_simbologia = $this->simbologia;
}
                        $this->mostrar_mapa();

if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_arc_archivo != $this->arc_archivo || (isset($bFlagRead_arc_archivo) && $bFlagRead_arc_archivo)))
    {
        $this->ajax_return_values_arc_archivo(true);
    }
    if (($original_mapa != $this->mapa || (isset($bFlagRead_mapa) && $bFlagRead_mapa)))
    {
        $this->ajax_return_values_mapa(true);
    }
    if (($original_simbologia != $this->simbologia || (isset($bFlagRead_simbologia) && $bFlagRead_simbologia)))
    {
        $this->ajax_return_values_simbologia(true);
    }
}
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob'][$I_conf]  = $Conf_opt;
              }
          }
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_tbl_archivos_1_mob']['upload_field_info']['arc_archivo'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_tbl_archivos_1_mob',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_file_height' => '800',
          'upload_file_width'  => '600',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbl_archivos_1_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbl_archivos_1_mob'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbl_archivos_1_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbl_archivos_1_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_tbl_archivos_1_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbl_archivos_1_mob']['label'] = "form_tbl_archivos_1_mob";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_tbl_archivos_1_mob")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "Georef";
      $_SESSION['scriptcase']['str_button_all'] = $this->Ini->Str_btn_form;
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);


      $this->arr_buttons['ver_mapa']['hint']             = "";
      $this->arr_buttons['ver_mapa']['type']             = "image";
      $this->arr_buttons['ver_mapa']['value']            = "ver_mapa";
      $this->arr_buttons['ver_mapa']['display']          = "only_img";
      $this->arr_buttons['ver_mapa']['display_position'] = "text_right";
      $this->arr_buttons['ver_mapa']['style']            = "default";
      $this->arr_buttons['ver_mapa']['image']            = "grp__NM__img__NM__geo_georref.png";

      $this->arr_buttons['ver_imagen']['hint']             = "";
      $this->arr_buttons['ver_imagen']['type']             = "image";
      $this->arr_buttons['ver_imagen']['value']            = "ver_imagen";
      $this->arr_buttons['ver_imagen']['display']          = "only_img";
      $this->arr_buttons['ver_imagen']['display_position'] = "text_right";
      $this->arr_buttons['ver_imagen']['style']            = "default";
      $this->arr_buttons['ver_imagen']['image']            = "grp__NM__img__NM__geo_imagenes.png";

      $this->arr_buttons['descarga']['hint']             = "";
      $this->arr_buttons['descarga']['type']             = "image";
      $this->arr_buttons['descarga']['value']            = "descarga";
      $this->arr_buttons['descarga']['display']          = "only_img";
      $this->arr_buttons['descarga']['display_position'] = "text_right";
      $this->arr_buttons['descarga']['style']            = "default";
      $this->arr_buttons['descarga']['image']            = "grp__NM__img__NM__geo_imprimir.png";

      $this->arr_buttons['contacto']['hint']             = "";
      $this->arr_buttons['contacto']['type']             = "image";
      $this->arr_buttons['contacto']['value']            = "contacto";
      $this->arr_buttons['contacto']['display']          = "only_img";
      $this->arr_buttons['contacto']['display_position'] = "text_right";
      $this->arr_buttons['contacto']['style']            = "default";
      $this->arr_buttons['contacto']['image']            = "grp__NM__img__NM__geo_email.png";

      $this->arr_buttons['mantenedor']['hint']             = "";
      $this->arr_buttons['mantenedor']['type']             = "image";
      $this->arr_buttons['mantenedor']['value']            = "Mantenedor";
      $this->arr_buttons['mantenedor']['display']          = "only_img";
      $this->arr_buttons['mantenedor']['display_position'] = "text_right";
      $this->arr_buttons['mantenedor']['style']            = "default";
      $this->arr_buttons['mantenedor']['image']            = "grp__NM__img__NM__settings.png";

      $this->arr_buttons['info']['hint']             = "";
      $this->arr_buttons['info']['type']             = "image";
      $this->arr_buttons['info']['value']            = "info";
      $this->arr_buttons['info']['display']          = "only_img";
      $this->arr_buttons['info']['display_position'] = "text_right";
      $this->arr_buttons['info']['style']            = "default";
      $this->arr_buttons['info']['image']            = "grp__NM__img__NM__geo_info.png";


      $_SESSION['scriptcase']['error_icon']['form_tbl_archivos_1_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_tbl_archivos_1_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['arc_archivo_ul_name']) && '' != $this->NM_ajax_info['param']['arc_archivo_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['upload_field_ul_name'][$this->arc_archivo_ul_name]))
          {
              $this->NM_ajax_info['param']['arc_archivo_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['upload_field_ul_name'][$this->arc_archivo_ul_name];
          }
          $this->arc_archivo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo_ul_name'];
          $this->arc_archivo_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo_ul_name'], 12);
          $this->arc_archivo_scfile_type = $this->NM_ajax_info['param']['arc_archivo_ul_type'];
          $this->arc_archivo_ul_name = $this->NM_ajax_info['param']['arc_archivo_ul_name'];
          $this->arc_archivo_ul_type = $this->NM_ajax_info['param']['arc_archivo_ul_type'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo             = sc_convert_encoding($this->arc_archivo,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_scfile_name = sc_convert_encoding($this->arc_archivo_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_ul_name     = sc_convert_encoding($this->arc_archivo_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo_ul_name) && '' != $this->arc_archivo_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['upload_field_ul_name'][$this->arc_archivo_ul_name]))
          {
              $this->arc_archivo_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['upload_field_ul_name'][$this->arc_archivo_ul_name];
          }
          $this->arc_archivo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo_ul_name;
          $this->arc_archivo_scfile_name = substr($this->arc_archivo_ul_name, 12);
          $this->arc_archivo_scfile_type = $this->arc_archivo_ul_type;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo             = sc_convert_encoding($this->arc_archivo,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_scfile_name = sc_convert_encoding($this->arc_archivo_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_ul_name     = sc_convert_encoding($this->arc_archivo_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "off";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['ver_mapa'] = "on";
      $this->nmgp_botoes['ver_imagen'] = "on";
      $this->nmgp_botoes['descarga'] = "on";
      $this->nmgp_botoes['contacto'] = "on";
      $this->nmgp_botoes['Mantenedor'] = "on";
      $this->nmgp_botoes['info'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_archivos_1_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_tbl_archivos_1_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 

      if (is_file($this->Ini->path_aplicacao . 'form_tbl_archivos_1_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_tbl_archivos_1_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_tbl_archivos_1/form_tbl_archivos_1_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_tbl_archivos_1_mob_erro.class.php"); 
      }
      $this->Erro      = new form_tbl_archivos_1_mob_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['opcao']))
         { 
             if ($this->arc_codigo != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_archivos_1_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['ver_mapa'] = "off";
          $this->nmgp_botoes['ver_imagen'] = "on";
          $this->nmgp_botoes['descarga'] = "on";
          $this->nmgp_botoes['contacto'] = "on";
          $this->nmgp_botoes['Mantenedor'] = "on";
          $this->nmgp_botoes['info'] = "on";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['ver_mapa'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['botoes']['ver_mapa'];
          $this->nmgp_botoes['ver_imagen'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['botoes']['ver_imagen'];
          $this->nmgp_botoes['descarga'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['botoes']['descarga'];
          $this->nmgp_botoes['contacto'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['botoes']['contacto'];
          $this->nmgp_botoes['Mantenedor'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['botoes']['Mantenedor'];
          $this->nmgp_botoes['info'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['botoes']['info'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9)))
      {
      $_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
                         

$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off'; 
      }
      if (isset($this->tpi_codigo)) { $this->nm_limpa_alfa($this->tpi_codigo); }
      if (isset($this->cla_codigo)) { $this->nm_limpa_alfa($this->cla_codigo); }
      if (isset($this->arc_codigo)) { $this->nm_limpa_alfa($this->arc_codigo); }
      if (isset($this->arc_glosa)) { $this->nm_limpa_alfa($this->arc_glosa); }
      if (isset($this->arc_comentario)) { $this->nm_limpa_alfa($this->arc_comentario); }
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "ver_mapa")
          { 
              $this->sc_btn_ver_mapa();
          } 
          if ($nm_call_php == "ver_imagen")
          { 
              $this->sc_btn_ver_imagen();
          } 
          $this->NM_close_db(); 
          exit;
      } 
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- arc_codigo
      $this->field_config['arc_codigo']               = array();
      $this->field_config['arc_codigo']['symbol_grp'] = '';
      $this->field_config['arc_codigo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['arc_codigo']['symbol_dec'] = '';
      $this->field_config['arc_codigo']['symbol_neg'] = '-';
      $this->field_config['arc_codigo']['format_neg'] = '2';
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
         $this->mapa = "<html>
<head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i" . $_SESSION['r'] . "=i" . $_SESSION['r'] . "||function(){
  (i" . $_SESSION['r'] . ".q=i" . $_SESSION['r'] . ".q||[]).push(arguments)},i" . $_SESSION['r'] . ".l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-84601044-1', 'auto');
  ga('send', 'pageview');
</script>
</head>
<body >
<iframe  style=\"top: -10px;\"    name=\"frame_mapa\" src=\"https://www.google.com/maps/d/embed?mid=1nfbcBrvLlqN2qHbq9toUOKe3MjI\" width=\"100%\" height=\"100%\">
</iframe>


</body>
</html>";
         $this->acceso = "";
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_arc_archivo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'arc_archivo');
          }
          if ('validate_simbologia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'simbologia');
          }
          if ('validate_arc_comentario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'arc_comentario');
          }
          if ('validate_tpi_codigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tpi_codigo');
          }
          if ('validate_cla_codigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cla_codigo');
          }
          if ('validate_arc_glosa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'arc_glosa');
          }
          if ('validate_arc_codigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'arc_codigo');
          }
          if ('validate_codigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codigo');
          }
          if ('validate_espacio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'espacio');
          }
          if ('validate_usuario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'usuario');
          }
          if ('validate_pasword' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pasword');
          }
          if ('validate_btn_login' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'btn_login');
          }
          form_tbl_archivos_1_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_arc_glosa_onchange' == $this->NM_ajax_opcao)
          {
              $this->arc_glosa_onChange();
          }
          if ('event_cla_codigo_onchange' == $this->NM_ajax_opcao)
          {
              $this->cla_codigo_onChange();
          }
          if ('event_pasword_onchange' == $this->NM_ajax_opcao)
          {
              $this->pasword_onChange();
          }
          if ('event_tpi_codigo_onchange' == $this->NM_ajax_opcao)
          {
              $this->tpi_codigo_onChange();
          }
          if ('event_usuario_onchange' == $this->NM_ajax_opcao)
          {
              $this->usuario_onChange();
          }
          if ('event_scajaxbutton_ver_mapa_onclick' == $this->NM_ajax_opcao)
          {
              $this->scajaxbutton_ver_mapa_onClick();
          }
          if ('event_scajaxbutton_ver_imagen_onclick' == $this->NM_ajax_opcao)
          {
              $this->scajaxbutton_ver_imagen_onClick();
          }
          form_tbl_archivos_1_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
    if ('recarga' == $nm_sc_sv_opcao) {
      $_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
                         

$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off'; 
    }
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_tbl_archivos_1_mob_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_tbl_archivos_1_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_tbl_archivos_1_mob_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_tbl_archivos_1_mob_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'mapa':
               return "mapa";
               break;
           case 'arc_archivo':
               return "Arc Archivo";
               break;
           case 'simbologia':
               return "simbologia";
               break;
           case 'arc_comentario':
               return "Arc Comentario";
               break;
           case 'tpi_codigo':
               return "Formato de Visualizaci�n";
               break;
           case 'cla_codigo':
               return "Tipo de Informaci�n";
               break;
           case 'arc_glosa':
               return "Contenido";
               break;
           case 'arc_codigo':
               return "Arc Codigo";
               break;
           case 'codigo':
               return "codigo";
               break;
           case 'espacio':
               return "espacio";
               break;
           case 'acceso':
               return "ACCESO PORTAL";
               break;
           case 'usuario':
               return "Usuario";
               break;
           case 'pasword':
               return "contrase�a";
               break;
           case 'btn_login':
               return "";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_tbl_archivos_1_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_tbl_archivos_1_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_tbl_archivos_1_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_tbl_archivos_1_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'arc_archivo' == $filtro)
        $this->ValidateField_arc_archivo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'simbologia' == $filtro)
        $this->ValidateField_simbologia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'arc_comentario' == $filtro)
        $this->ValidateField_arc_comentario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tpi_codigo' == $filtro)
        $this->ValidateField_tpi_codigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cla_codigo' == $filtro)
        $this->ValidateField_cla_codigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'arc_glosa' == $filtro)
        $this->ValidateField_arc_glosa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'arc_codigo' == $filtro)
        $this->ValidateField_arc_codigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'codigo' == $filtro)
        $this->ValidateField_codigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'espacio' == $filtro)
        $this->ValidateField_espacio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'usuario' == $filtro)
        $this->ValidateField_usuario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pasword' == $filtro)
        $this->ValidateField_pasword($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'btn_login' == $filtro)
        $this->ValidateField_btn_login($Campos_Crit, $Campos_Falta, $Campos_Erros);
      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_arc_archivo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        if ($this->nmgp_opcao == "incluir")
        {
            $sTestFile = $this->arc_archivo;
            if ("" != $this->arc_archivo && "S" != $this->arc_archivo_limpa && !$teste_validade->ArqExtensao($this->arc_archivo, array()))
            {
                $Campos_Crit .= "Arc Archivo: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['arc_archivo']))
                {
                    $Campos_Erros['arc_archivo'] = array();
                }
                $Campos_Erros['arc_archivo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['arc_archivo']) || !is_array($this->NM_ajax_info['errList']['arc_archivo']))
                {
                    $this->NM_ajax_info['errList']['arc_archivo'] = array();
                }
                $this->NM_ajax_info['errList']['arc_archivo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
    } // ValidateField_arc_archivo

    function ValidateField_simbologia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->simbologia) != "")  
          { 
          } 
      } 
    } // ValidateField_simbologia

    function ValidateField_arc_comentario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->arc_comentario) > 500) 
          { 
              $Campos_Crit .= "Arc Comentario " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 500 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['arc_comentario']))
              {
                  $Campos_Erros['arc_comentario'] = array();
              }
              $Campos_Erros['arc_comentario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 500 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['arc_comentario']) || !is_array($this->NM_ajax_info['errList']['arc_comentario']))
              {
                  $this->NM_ajax_info['errList']['arc_comentario'] = array();
              }
              $this->NM_ajax_info['errList']['arc_comentario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 500 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_arc_comentario

    function ValidateField_tpi_codigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->tpi_codigo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_tpi_codigo']) && !in_array($this->tpi_codigo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_tpi_codigo']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['tpi_codigo']))
                   {
                       $Campos_Erros['tpi_codigo'] = array();
                   }
                   $Campos_Erros['tpi_codigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['tpi_codigo']) || !is_array($this->NM_ajax_info['errList']['tpi_codigo']))
                   {
                       $this->NM_ajax_info['errList']['tpi_codigo'] = array();
                   }
                   $this->NM_ajax_info['errList']['tpi_codigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_tpi_codigo

    function ValidateField_cla_codigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->cla_codigo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_cla_codigo']) && !in_array($this->cla_codigo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_cla_codigo']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['cla_codigo']))
                   {
                       $Campos_Erros['cla_codigo'] = array();
                   }
                   $Campos_Erros['cla_codigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['cla_codigo']) || !is_array($this->NM_ajax_info['errList']['cla_codigo']))
                   {
                       $this->NM_ajax_info['errList']['cla_codigo'] = array();
                   }
                   $this->NM_ajax_info['errList']['cla_codigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_cla_codigo

    function ValidateField_arc_glosa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->arc_glosa) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_arc_glosa']) && !in_array($this->arc_glosa, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_arc_glosa']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['arc_glosa']))
                   {
                       $Campos_Erros['arc_glosa'] = array();
                   }
                   $Campos_Erros['arc_glosa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['arc_glosa']) || !is_array($this->NM_ajax_info['errList']['arc_glosa']))
                   {
                       $this->NM_ajax_info['errList']['arc_glosa'] = array();
                   }
                   $this->NM_ajax_info['errList']['arc_glosa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_arc_glosa

    function ValidateField_arc_codigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_numero($this->arc_codigo, $this->field_config['arc_codigo']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->arc_codigo != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->arc_codigo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Arc Codigo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['arc_codigo']))
                  {
                      $Campos_Erros['arc_codigo'] = array();
                  }
                  $Campos_Erros['arc_codigo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['arc_codigo']) || !is_array($this->NM_ajax_info['errList']['arc_codigo']))
                  {
                      $this->NM_ajax_info['errList']['arc_codigo'] = array();
                  }
                  $this->NM_ajax_info['errList']['arc_codigo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->arc_codigo, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Arc Codigo; " ; 
                  if (!isset($Campos_Erros['arc_codigo']))
                  {
                      $Campos_Erros['arc_codigo'] = array();
                  }
                  $Campos_Erros['arc_codigo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['arc_codigo']) || !is_array($this->NM_ajax_info['errList']['arc_codigo']))
                  {
                      $this->NM_ajax_info['errList']['arc_codigo'] = array();
                  }
                  $this->NM_ajax_info['errList']['arc_codigo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['php_cmp_required']['arc_codigo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['php_cmp_required']['arc_codigo'] == "on") 
           { 
              $Campos_Falta[] = "Arc Codigo" ; 
              if (!isset($Campos_Erros['arc_codigo']))
              {
                  $Campos_Erros['arc_codigo'] = array();
              }
              $Campos_Erros['arc_codigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['arc_codigo']) || !is_array($this->NM_ajax_info['errList']['arc_codigo']))
                  {
                      $this->NM_ajax_info['errList']['arc_codigo'] = array();
                  }
                  $this->NM_ajax_info['errList']['arc_codigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_arc_codigo

    function ValidateField_codigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codigo) > 20) 
          { 
              $Campos_Crit .= "codigo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codigo']))
              {
                  $Campos_Erros['codigo'] = array();
              }
              $Campos_Erros['codigo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codigo']) || !is_array($this->NM_ajax_info['errList']['codigo']))
              {
                  $this->NM_ajax_info['errList']['codigo'] = array();
              }
              $this->NM_ajax_info['errList']['codigo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->codigo ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->codigo, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $Campos_Crit .= "codigo " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['codigo']))
              {
                  $Campos_Erros['codigo'] = array();
              }
              $Campos_Erros['codigo'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['codigo']) || !is_array($this->NM_ajax_info['errList']['codigo']))
              {
                  $this->NM_ajax_info['errList']['codigo'] = array();
              }
              $this->NM_ajax_info['errList']['codigo'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
    } // ValidateField_codigo

    function ValidateField_espacio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->espacio) != "")  
          { 
          } 
      } 
    } // ValidateField_espacio

    function ValidateField_usuario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->usuario) > 20) 
          { 
              $Campos_Crit .= "Usuario " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['usuario']))
              {
                  $Campos_Erros['usuario'] = array();
              }
              $Campos_Erros['usuario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['usuario']) || !is_array($this->NM_ajax_info['errList']['usuario']))
              {
                  $this->NM_ajax_info['errList']['usuario'] = array();
              }
              $this->NM_ajax_info['errList']['usuario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_usuario

    function ValidateField_pasword(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->nm_tira_mask($this->pasword, "***********", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pasword) > 10) 
          { 
              $Campos_Crit .= "contrase�a " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pasword']))
              {
                  $Campos_Erros['pasword'] = array();
              }
              $Campos_Erros['pasword'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pasword']) || !is_array($this->NM_ajax_info['errList']['pasword']))
              {
                  $this->NM_ajax_info['errList']['pasword'] = array();
              }
              $this->NM_ajax_info['errList']['pasword'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_pasword

    function ValidateField_btn_login(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->btn_login) != "")  
          { 
          } 
      } 
    } // ValidateField_btn_login
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros) 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao == "incluir" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['recarga'] == "novo")
      { 
          if ($this->arc_archivo == "none") 
          { 
              $this->arc_archivo = ""; 
          } 
          if ($this->arc_archivo != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_tbl_archivos_1_mob_doc_name.php';
              }
              $this->arc_archivo = sc_upload_unprotect_chars($this->arc_archivo);
              $this->arc_archivo_scfile_name = sc_upload_unprotect_chars($this->arc_archivo_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->arc_archivo_scfile_type = substr($this->arc_archivo_scfile_type, 0, strpos($this->arc_archivo_scfile_type, ";")) ; 
              } 
              if ($this->arc_archivo_scfile_type == "image/pjpeg" || $this->arc_archivo_scfile_type == "image/jpeg" || $this->arc_archivo_scfile_type == "image/gif" ||  
                  $this->arc_archivo_scfile_type == "image/png" || $this->arc_archivo_scfile_type == "image/x-png" || $this->arc_archivo_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->arc_archivo))  
                  { 
                      $reg_arc_archivo = file_get_contents($this->arc_archivo); 
                      $this->arc_archivo = $reg_arc_archivo; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Arc Archivo " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->arc_archivo = "";
                      if (!isset($Campos_Erros['arc_archivo']))
                      {
                          $Campos_Erros['arc_archivo'] = array();
                      }
                      $Campos_Erros['arc_archivo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['arc_archivo']) || !is_array($this->NM_ajax_info['errList']['arc_archivo']))
                      {
                          $this->NM_ajax_info['errList']['arc_archivo'] = array();
                      }
                      $this->NM_ajax_info['errList']['arc_archivo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->arc_archivo = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "Arc Archivo " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['arc_archivo']))
                      {
                          $Campos_Erros['arc_archivo'] = array();
                      }
                      $Campos_Erros['arc_archivo'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['arc_archivo']) || !is_array($this->NM_ajax_info['errList']['arc_archivo']))
                      {
                          $this->NM_ajax_info['errList']['arc_archivo'] = array();
                      }
                      $this->NM_ajax_info['errList']['arc_archivo'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['dados_form']['arc_archivo']) && $this->arc_archivo_limpa != "S")
          {
              $this->arc_archivo = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['dados_form']['arc_archivo'];
          }
      } 
   }

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['mapa'] = $this->mapa;
    if (empty($this->arc_archivo))
    {
        $this->arc_archivo = $this->nmgp_dados_form['arc_archivo'];
    }
    $this->nmgp_dados_form['arc_archivo'] = $this->arc_archivo;
    $this->nmgp_dados_form['arc_archivo_limpa'] = $this->arc_archivo_limpa;
    $this->nmgp_dados_form['simbologia'] = $this->simbologia;
    $this->nmgp_dados_form['arc_comentario'] = $this->arc_comentario;
    $this->nmgp_dados_form['tpi_codigo'] = $this->tpi_codigo;
    $this->nmgp_dados_form['cla_codigo'] = $this->cla_codigo;
    $this->nmgp_dados_form['arc_glosa'] = $this->arc_glosa;
    $this->nmgp_dados_form['arc_codigo'] = $this->arc_codigo;
    $this->nmgp_dados_form['codigo'] = $this->codigo;
    $this->nmgp_dados_form['espacio'] = $this->espacio;
    $this->nmgp_dados_form['acceso'] = $this->acceso;
    $this->nmgp_dados_form['usuario'] = $this->usuario;
    $this->nmgp_dados_form['pasword'] = $this->pasword;
    $this->nmgp_dados_form['btn_login'] = $this->btn_login;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->arc_codigo, $this->field_config['arc_codigo']['symbol_grp']) ; 
      $this->nm_tira_mask($this->pasword, "***********", "(){}[].,;:-+/ "); 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~ei', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "arc_codigo")
      {
          nm_limpa_numero($this->arc_codigo, $this->field_config['arc_codigo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pasword")
      {
          $this->nm_tira_mask($this->pasword, "***********", "(){}[].,;:-+/ "); 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if (!empty($this->arc_codigo) || (!empty($format_fields) && isset($format_fields['arc_codigo'])))
      {
          nmgp_Form_Num_Val($this->arc_codigo, $this->field_config['arc_codigo']['symbol_grp'], $this->field_config['arc_codigo']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['arc_codigo']['symbol_fmt']) ; 
      }
      if (!empty($this->pasword) || (!empty($format_fields) && isset($format_fields['pasword'])))
      {
          $this->nm_gera_mask($this->pasword, "***********"); 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_mapa();
          $this->ajax_return_values_arc_archivo();
          $this->ajax_return_values_simbologia();
          $this->ajax_return_values_arc_comentario();
          $this->ajax_return_values_tpi_codigo();
          $this->ajax_return_values_cla_codigo();
          $this->ajax_return_values_arc_glosa();
          $this->ajax_return_values_arc_codigo();
          $this->ajax_return_values_codigo();
          $this->ajax_return_values_espacio();
          $this->ajax_return_values_acceso();
          $this->ajax_return_values_usuario();
          $this->ajax_return_values_pasword();
          $this->ajax_return_values_btn_login();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['arc_codigo']['keyVal'] = form_tbl_archivos_1_mob_pack_protect_string($this->nmgp_dados_form['arc_codigo']);
          }
   } // ajax_return_values

          //----- mapa
   function ajax_return_values_mapa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("mapa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->mapa);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['mapa'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- arc_archivo
   function ajax_return_values_arc_archivo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("arc_archivo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->arc_archivo);
              $aLookup = array();
   $out_arc_archivo = '';
   $out1_arc_archivo = '';
   if ('' != $this->arc_archivo_ul_name && @is_file($this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo_ul_name))
   {
       $this->arc_archivo = @file_get_contents($this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo_ul_name);
   }
   if ($this->arc_archivo != "" && $this->arc_archivo != "none")   
   { 
       $out_arc_archivo = $this->Ini->path_imag_temp . "/sc_arc_archivo_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_arc_archivo = $out_arc_archivo; 
       $arq_arc_archivo = fopen($this->Ini->root . $out_arc_archivo, "w") ;  
       if (substr($this->arc_archivo, 0, 4) == "*nm*") 
       { 
           $this->arc_archivo = substr($this->arc_archivo, 4) ; 
           $this->arc_archivo = base64_decode($this->arc_archivo) ; 
       } 
       $img_pos_bm = strpos($this->arc_archivo, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->arc_archivo = substr($this->arc_archivo, $img_pos_bm) ; 
       } 
       fwrite($arq_arc_archivo, $this->arc_archivo) ;  
       fclose($arq_arc_archivo) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_arc_archivo);
       $this->nmgp_return_img['arc_archivo'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['arc_archivo'][1] = $sc_obj_img->getWidth();
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       $out_arc_archivo = $this->Ini->path_imag_temp . "/sc_" . "arc_archivo_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_arc_archivo);
           $sc_obj_img->setWidth(600);
           $sc_obj_img->setHeight(800);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_arc_archivo);
       } 
       else 
       { 
           $out_arc_archivo = $out1_arc_archivo;
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['arc_archivo'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
               'imgFile' => $out_arc_archivo,
               'imgOrig' => $out1_arc_archivo,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- simbologia
   function ajax_return_values_simbologia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("simbologia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->simbologia);
              $aLookup = array();
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__img__NM__Prototipo iconos2.png"))
          { 
              $simbologia = "&nbsp;" ;  
          } 
          else 
          { 
              $simbologia = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__img__NM__Prototipo iconos2.png\"/>" ; 
          } 
    $sTmpImgHtml = "" . $simbologia . "";
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['simbologia'] = array(
                       'row'    => '',
               'type'    => 'imagehtml',
               'valList' => array($sTmpValue),
               'imgHtml' => $sTmpImgHtml,
              );
          }
   }

          //----- arc_comentario
   function ajax_return_values_arc_comentario($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("arc_comentario", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->arc_comentario);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['arc_comentario'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tpi_codigo
   function ajax_return_values_tpi_codigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tpi_codigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tpi_codigo);
              $aLookup = array();
              $this->_tmp_lookup_tpi_codigo = $this->tpi_codigo;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_tpi_codigo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_tpi_codigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_tpi_codigo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_tpi_codigo'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_arc_codigo = $this->arc_codigo;
   $old_value_pasword = $this->pasword;
   $this->nm_tira_formatacao();


   $unformatted_value_arc_codigo = $this->arc_codigo;
   $unformatted_value_pasword = $this->pasword;

   $nm_comando = "SELECT tpi_codigo, tpi_descripcion 
FROM tbl_tipo_informacion 
ORDER BY tpi_codigo ASC;";

   $this->arc_codigo = $old_value_arc_codigo;
   $this->pasword = $old_value_pasword;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_tbl_archivos_1_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_tbl_archivos_1_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_tpi_codigo'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tpi_codigo\"";
          if (isset($this->NM_ajax_info['select_html']['tpi_codigo']) && !empty($this->NM_ajax_info['select_html']['tpi_codigo']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['tpi_codigo'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->tpi_codigo == $sValue)
                  {
                      $this->_tmp_lookup_tpi_codigo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tpi_codigo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tpi_codigo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tpi_codigo']['valList'][$i] = form_tbl_archivos_1_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tpi_codigo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tpi_codigo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tpi_codigo']['labList'] = $aLabel;
          }
   }

          //----- cla_codigo
   function ajax_return_values_cla_codigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cla_codigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cla_codigo);
              $aLookup = array();
              $this->_tmp_lookup_cla_codigo = $this->cla_codigo;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_cla_codigo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_cla_codigo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_cla_codigo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_cla_codigo'] = array(); 
}
if ($this->tpi_codigo != "")
{ 
   $this->nm_clear_val("tpi_codigo");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_arc_codigo = $this->arc_codigo;
   $old_value_pasword = $this->pasword;
   $this->nm_tira_formatacao();


   $unformatted_value_arc_codigo = $this->arc_codigo;
   $unformatted_value_pasword = $this->pasword;

   $nm_comando = "SELECT cla_codigo, cla_descripcion, tpi_codigo
FROM tbl_clasificacion 
where tpi_codigo = '$this->tpi_codigo'
ORDER BY cla_codigo ASC";

   $this->arc_codigo = $old_value_arc_codigo;
   $this->pasword = $old_value_pasword;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[2] = str_replace(',', '.', $rs->fields[2]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[2] = (strpos(strtolower($rs->fields[2]), "e")) ? (float)$rs->fields[2] : $rs->fields[2];
              $rs->fields[2] = (string)$rs->fields[2];
              $aLookup[] = array(form_tbl_archivos_1_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_tbl_archivos_1_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_cla_codigo'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"cla_codigo\"";
          if (isset($this->NM_ajax_info['select_html']['cla_codigo']) && !empty($this->NM_ajax_info['select_html']['cla_codigo']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['cla_codigo'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->cla_codigo == $sValue)
                  {
                      $this->_tmp_lookup_cla_codigo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['cla_codigo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cla_codigo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cla_codigo']['valList'][$i] = form_tbl_archivos_1_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cla_codigo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cla_codigo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cla_codigo']['labList'] = $aLabel;
          }
   }

          //----- arc_glosa
   function ajax_return_values_arc_glosa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("arc_glosa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->arc_glosa);
              $aLookup = array();
              $this->_tmp_lookup_arc_glosa = $this->arc_glosa;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_arc_glosa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_arc_glosa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_arc_glosa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_arc_glosa'] = array(); 
}
if ($this->tpi_codigo != "" && $this->cla_codigo != "")
{ 
   $this->nm_clear_val("tpi_codigo");
   $this->nm_clear_val("cla_codigo");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_arc_codigo = $this->arc_codigo;
   $old_value_pasword = $this->pasword;
   $this->nm_tira_formatacao();


   $unformatted_value_arc_codigo = $this->arc_codigo;
   $unformatted_value_pasword = $this->pasword;

   $nm_comando = "SELECT arc_codigo, arc_glosa 
FROM tbl_archivos 
where tbl_archivos.tpi_codigo = '$this->tpi_codigo'
and tbl_archivos.cla_codigo = '$this->cla_codigo'
ORDER BY arc_codigo ASC;";

   $this->arc_codigo = $old_value_arc_codigo;
   $this->pasword = $old_value_pasword;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_tbl_archivos_1_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_tbl_archivos_1_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['Lookup_arc_glosa'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"arc_glosa\"";
          if (isset($this->NM_ajax_info['select_html']['arc_glosa']) && !empty($this->NM_ajax_info['select_html']['arc_glosa']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['arc_glosa'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->arc_glosa == $sValue)
                  {
                      $this->_tmp_lookup_arc_glosa = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['arc_glosa'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['arc_glosa']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['arc_glosa']['valList'][$i] = form_tbl_archivos_1_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['arc_glosa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['arc_glosa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['arc_glosa']['labList'] = $aLabel;
          }
   }

          //----- arc_codigo
   function ajax_return_values_arc_codigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("arc_codigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->arc_codigo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['arc_codigo'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- codigo
   function ajax_return_values_codigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codigo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codigo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- espacio
   function ajax_return_values_espacio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("espacio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->espacio);
              $aLookup = array();
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__img__NM__barra_300.png"))
          { 
              $espacio = "&nbsp;" ;  
          } 
          else 
          { 
              $espacio = "<img border=\"7px\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__img__NM__barra_300.png\"/>" ; 
          } 
    $sTmpImgHtml = "" . $espacio . "";
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['espacio'] = array(
                       'row'    => '',
               'type'    => 'imagehtml',
               'valList' => array($sTmpValue),
               'imgHtml' => $sTmpImgHtml,
              );
          }
   }

          //----- acceso
   function ajax_return_values_acceso($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("acceso", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->acceso);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['acceso'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- usuario
   function ajax_return_values_usuario($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("usuario", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->usuario);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['usuario'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pasword
   function ajax_return_values_pasword($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pasword", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pasword);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pasword'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array(''),
              );
          }
   }

          //----- btn_login
   function ajax_return_values_btn_login($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("btn_login", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->btn_login);
              $aLookup = array();
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__img__NM__geo_login.png"))
          { 
              $btn_login = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $btn_login = "<span class=\"scFormErrorMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_btn_login = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__img__NM__geo_login.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__img__NM__geo_login.png"); 
              $out_btn_login = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $out_btn_login = $this->Ini->path_imag_temp . "/sc_" . $out_btn_login . "_btn_login_3060_" . $img_time . "_grp__NM__img__NM__geo_login.png";
              if (!is_file($this->Ini->root . $out_btn_login)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_btn_login);
                  $sc_obj_img->setWidth(60);
                  $sc_obj_img->setHeight(30);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_btn_login);
              } 
              $btn_login = "<img border=\"0\" src=\"" . $out_btn_login . "\"/>" ; 
          } 
    $sTmpImgHtml = "<a href=\"javascript:nm_gp_submit('" . $this->Ini->link_validacion_edit . "', '$this->nm_location', 'usuario?#?" . str_replace("'", "@aspass@", $_SESSION['user']) . "?@?SC_glo_par_usuario?#?user?@?password?#?" . str_replace("'", "@aspass@", $_SESSION['pass']) . "?@?SC_glo_par_password?#?pass?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?', '', '_self', '0', '0', 'validacion')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $btn_login . "</font></a>";
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['btn_login'] = array(
                       'row'    => '',
               'type'    => 'imagehtml',
               'valList' => array($sTmpValue),
               'imgHtml' => $sTmpImgHtml,
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_arc_codigo = $this->arc_codigo;
    $original_pasword = $this->pasword;
    $original_usuario = $this->usuario;
}
if (!isset($this->sc_temp_codigo_archivo)) {$this->sc_temp_codigo_archivo = (isset($_SESSION['codigo_archivo'])) ? $_SESSION['codigo_archivo'] : "";}
                         $this->NM_ajax_info['buttonDisplay']['first'] = $this->nmgp_botoes["first"] = "off";;
$this->usuario ="";
$this->pasword ="";

 if (isset($this->sc_temp_codigo_archivo)) { $_SESSION['codigo_archivo'] = $this->sc_temp_codigo_archivo;}
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('mensaje') . "/", $this->nm_location, "", "modal", "ret_self", 350, 630);;

if($this->sc_temp_codigo_archivo=="") 
	{
     $this->sc_temp_codigo_archivo = $this->arc_codigo ;
	} 
else
	{
}
if (isset($this->sc_temp_codigo_archivo)) { $_SESSION['codigo_archivo'] = $this->sc_temp_codigo_archivo;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_arc_codigo != $this->arc_codigo || (isset($bFlagRead_arc_codigo) && $bFlagRead_arc_codigo)))
    {
        $this->ajax_return_values_arc_codigo(true);
    }
    if (($original_pasword != $this->pasword || (isset($bFlagRead_pasword) && $bFlagRead_pasword)))
    {
        $this->ajax_return_values_pasword(true);
    }
    if (($original_usuario != $this->usuario || (isset($bFlagRead_usuario) && $bFlagRead_usuario)))
    {
        $this->ajax_return_values_usuario(true);
    }
}
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off'; 
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      $SC_tem_cmp_update = true; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['mapa'] = $this->mapa;
      $NM_val_form['arc_archivo'] = $this->arc_archivo;
      $NM_val_form['simbologia'] = $this->simbologia;
      $NM_val_form['arc_comentario'] = $this->arc_comentario;
      $NM_val_form['tpi_codigo'] = $this->tpi_codigo;
      $NM_val_form['cla_codigo'] = $this->cla_codigo;
      $NM_val_form['arc_glosa'] = $this->arc_glosa;
      $NM_val_form['arc_codigo'] = $this->arc_codigo;
      $NM_val_form['codigo'] = $this->codigo;
      $NM_val_form['espacio'] = $this->espacio;
      $NM_val_form['acceso'] = $this->acceso;
      $NM_val_form['usuario'] = $this->usuario;
      $NM_val_form['pasword'] = $this->pasword;
      $NM_val_form['btn_login'] = $this->btn_login;
      if ($this->tpi_codigo == "")  
      { 
          $this->tpi_codigo = 0;
          $this->sc_force_zero[] = 'tpi_codigo';
      } 
      if ($this->cla_codigo == "")  
      { 
          $this->cla_codigo = 0;
          $this->sc_force_zero[] = 'cla_codigo';
      } 
      if ($this->arc_codigo == "")  
      { 
          $this->arc_codigo = 0;
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->arc_glosa_before_qstr = $this->arc_glosa;
          $this->arc_glosa = substr($this->Db->qstr($this->arc_glosa), 1, -1); 
          $this->arc_comentario_before_qstr = $this->arc_comentario;
          $this->arc_comentario = substr($this->Db->qstr($this->arc_comentario), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              if (!empty($this->arc_archivo) && $this->arc_archivo != 'null' && substr($this->arc_archivo, 0, 4) != "*nm*") 
              { 
                  $this->arc_archivo = "*nm*" . base64_encode($this->arc_archivo) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { }
          else
          { 
              $this->arc_archivo =  substr($this->Db->qstr($this->arc_archivo), 1, -1);
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_tbl_archivos_1_mob_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $comando_oracle = "";  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET tpi_codigo = $this->tpi_codigo, cla_codigo = $this->cla_codigo, arc_glosa = '$this->arc_glosa', arc_comentario = '$this->arc_comentario'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET tpi_codigo = $this->tpi_codigo, cla_codigo = $this->cla_codigo, arc_glosa = '$this->arc_glosa', arc_comentario = '$this->arc_comentario'";  
              } 
              $aDoNotUpdate = array();
              $temp_cmd_sql = "";
              if ($this->arc_archivo_limpa == "S") 
              { 
                  if ($this->arc_archivo != "null") 
                  { 
                      $this->arc_archivo = ''; 
                  } 
                  if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                  { 
                      $temp_cmd_sql .= ", arc_archivo = '" . $this->arc_archivo . "'"; 
                  } 
                  else 
                  { 
                     $temp_cmd_sql .= " arc_archivo = '" . $this->arc_archivo . "'"; 
                     $SC_ex_update = true; 
                  } 
                  $this->arc_archivo = "";
              } 
              else 
              { 
                  if ($this->arc_archivo != "none" && $this->arc_archivo != "") 
                  { 
                      $NM_conteudo =  $this->arc_archivo;
                      if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                      { 
                          $temp_cmd_sql .= ", arc_archivo = '$NM_conteudo'" ; 
                      } 
                      else 
                      { 
                          $temp_cmd_sql .= " arc_archivo = '$NM_conteudo'" ; 
                          $SC_ex_update = true; 
                      } 
                  } 
                  else
                  {
                      $aDoNotUpdate[] = "arc_archivo";
                  }
              } 
              if (!empty($temp_cmd_sql)) 
              { 
                  $comando .= $temp_cmd_sql;
              } 
              if ($this->arc_archivo_limpa == "S" || ($this->arc_archivo != "none" && $this->arc_archivo != "")) 
              { 
                  if ($SC_ex_upd_or) 
                  { 
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                      { 
                          $comando_oracle .= ", arc_archivo = ''"; 
                      } 
                      else 
                      { 
                          $comando_oracle .= ", arc_archivo = empty_blob()"; 
                      } 
                  } 
                  else 
                  { 
                      $SC_ex_upd_or = true; 
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                      { 
                          $comando_oracle .= " arc_archivo = ''"; 
                      } 
                      else 
                      { 
                          $comando_oracle .= " arc_archivo = empty_blob()"; 
                      } 
                  } 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              $comando .= " WHERE arc_codigo = $this->arc_codigo ";  
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_tbl_archivos_1_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if ($this->arc_archivo_limpa == "S" && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"arc_archivo\", \"\",  \"arc_codigo = $this->arc_codigo\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "arc_archivo", "",  "arc_codigo = $this->arc_codigo"); 
                  } 
                  else 
                  { 
                      if ($this->arc_archivo != "none" && $this->arc_archivo != "") 
                      { 
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"arc_archivo\", $this->arc_archivo,  \"arc_codigo = $this->arc_codigo\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "arc_archivo", $this->arc_archivo,  "arc_codigo = $this->arc_codigo"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_tbl_archivos_1_mob_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->arc_archivo_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['arc_archivo_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
          $this->arc_glosa = $this->arc_glosa_before_qstr;
          $this->arc_comentario = $this->arc_comentario_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['tpi_codigo'])) { $this->tpi_codigo = $NM_val_form['tpi_codigo']; }
              elseif (isset($this->tpi_codigo)) { $this->nm_limpa_alfa($this->tpi_codigo); }
              if     (isset($NM_val_form) && isset($NM_val_form['cla_codigo'])) { $this->cla_codigo = $NM_val_form['cla_codigo']; }
              elseif (isset($this->cla_codigo)) { $this->nm_limpa_alfa($this->cla_codigo); }
              if     (isset($NM_val_form) && isset($NM_val_form['arc_codigo'])) { $this->arc_codigo = $NM_val_form['arc_codigo']; }
              elseif (isset($this->arc_codigo)) { $this->nm_limpa_alfa($this->arc_codigo); }
              if     (isset($NM_val_form) && isset($NM_val_form['arc_glosa'])) { $this->arc_glosa = $NM_val_form['arc_glosa']; }
              elseif (isset($this->arc_glosa)) { $this->nm_limpa_alfa($this->arc_glosa); }
              if     (isset($NM_val_form) && isset($NM_val_form['arc_comentario'])) { $this->arc_comentario = $NM_val_form['arc_comentario']; }
              elseif (isset($this->arc_comentario)) { $this->nm_limpa_alfa($this->arc_comentario); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('mapa', 'arc_archivo', 'simbologia', 'arc_comentario', 'tpi_codigo', 'cla_codigo', 'arc_glosa', 'arc_codigo', 'codigo', 'espacio', 'acceso', 'usuario', 'pasword', 'btn_login'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $bInsertOk = true;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo "; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_pkey']); 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_tbl_archivos_1_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->arc_archivo_scfile_name, $dir_file, "arc_archivo");
              if (trim($this->arc_archivo_scfile_name) != $_test_file)
              {
                  $this->arc_archivo_scfile_name = $_test_file;
                  $this->arc_archivo = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tpi_codigo, cla_codigo, arc_codigo, arc_glosa, arc_comentario, arc_archivo) VALUES (" . $NM_seq_auto . "$this->tpi_codigo, $this->cla_codigo, $this->arc_codigo, '$this->arc_glosa', '$this->arc_comentario', '')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tpi_codigo, cla_codigo, arc_codigo, arc_glosa, arc_comentario, arc_archivo) VALUES (" . $NM_seq_auto . "$this->tpi_codigo, $this->cla_codigo, $this->arc_codigo, '$this->arc_glosa', '$this->arc_comentario', '$this->arc_archivo')"; 
              }
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_tbl_archivos_1_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->arc_archivo ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  arc_archivo , $this->arc_archivo,  \"arc_codigo = $this->arc_codigo\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "arc_archivo", $this->arc_archivo,  "arc_codigo = $this->arc_codigo"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_tbl_archivos_1_mob_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
              $_SESSION["tpi_codigo"] = $this->tpi_codigo;  
              $_SESSION["cla_codigo"] = $this->cla_codigo;  
              $_SESSION["archivo_codigo"] = $this->arc_glosa;  
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->arc_codigo = substr($this->Db->qstr($this->arc_codigo), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_tbl_archivos_1_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['parms'] = "arc_codigo?#?$this->arc_codigo?@?"; 
      }
      $this->nmgp_dados_form['arc_archivo'] = ""; 
      $this->arc_archivo_limpa = ""; 
      $this->arc_archivo_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->arc_codigo = substr($this->Db->qstr($this->arc_codigo), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->arc_codigo)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->arc_codigo) === "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_tbl_archivos_1_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['total'] = $qt_geral_reg_form_tbl_archivos_1_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->arc_codigo))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              $Sel_Chave = "arc_codigo"; 
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "tpi_codigo";
              $sc_order_by = str_replace("order by ", "", $sc_order_by);
              $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
              if (!empty($sc_order_by))
              {
                  $nmgp_select .= " order by $sc_order_by "; 
              }
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              while (!$rt->EOF && !$Reg_OK)
              { 
                  if ($rt->fields[0] == $this->arc_codigo)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_tbl_archivos_1_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start'] > $qt_geral_reg_form_tbl_archivos_1_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start'] = $qt_geral_reg_form_tbl_archivos_1_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start'] = $qt_geral_reg_form_tbl_archivos_1_mob; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start'] = 0;
      }
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['parms'] = ""; 
          $nmgp_select = "SELECT tpi_codigo, cla_codigo, arc_codigo, arc_glosa, arc_comentario, arc_archivo from " . $this->Ini->nm_tabela ; 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              $aWhere[] = "arc_codigo = $this->arc_codigo"; 
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "tpi_codigo";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['ver_mapa'] = $this->nmgp_botoes['ver_mapa'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['ver_imagen'] = $this->nmgp_botoes['ver_imagen'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['descarga'] = $this->nmgp_botoes['descarga'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['contacto'] = $this->nmgp_botoes['contacto'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['Mantenedor'] = $this->nmgp_botoes['Mantenedor'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['info'] = $this->nmgp_botoes['info'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes['update'] = "off";
              $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes['delete'] = "off";
              return; 
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->tpi_codigo = $rs->fields[0] ; 
              $this->nmgp_dados_select['tpi_codigo'] = $this->tpi_codigo;
              $this->cla_codigo = $rs->fields[1] ; 
              $this->nmgp_dados_select['cla_codigo'] = $this->cla_codigo;
              $this->arc_codigo = $rs->fields[2] ; 
              $this->nmgp_dados_select['arc_codigo'] = $this->arc_codigo;
              $this->arc_glosa = $rs->fields[3] ; 
              $this->nmgp_dados_select['arc_glosa'] = $this->arc_glosa;
              $this->arc_comentario = $rs->fields[4] ; 
              $this->nmgp_dados_select['arc_comentario'] = $this->arc_comentario;
              $this->arc_archivo = $rs->fields[5] ; 
              $this->nmgp_dados_select['arc_archivo'] = $this->arc_archivo;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->tpi_codigo = (string)$this->tpi_codigo; 
              $this->cla_codigo = (string)$this->cla_codigo; 
              $this->arc_codigo = (string)$this->arc_codigo; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['parms'] = "arc_codigo?#?$this->arc_codigo?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['sub_dir'][0]  = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['reg_start'] < $qt_geral_reg_form_tbl_archivos_1_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->tpi_codigo = "";  
              $this->cla_codigo = "";  
              $this->arc_codigo = "";  
              $this->arc_glosa = "";  
              $this->arc_comentario = "";  
              $this->arc_archivo = "";  
              $this->arc_archivo_ul_name = "" ;  
              $this->arc_archivo_ul_type = "" ;  
              $this->simbologia = "";  
              $this->codigo = "";  
              $this->usuario = "";  
              $this->pasword = "";  
              $this->btn_login = "";  
              $this->espacio = "";  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
          $_SESSION["tpi_codigo"] = $this->tpi_codigo;  
          $_SESSION["cla_codigo"] = $this->cla_codigo;  
          $_SESSION["archivo_codigo"] = $this->arc_glosa;  
      }
      $this->nm_proc_onload();
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(arc_codigo) from " . $this->Ini->nm_tabela . " where arc_codigo < $this->arc_codigo" . $str_where_filter; 
     $rs = $this->Db->Execute("select max(arc_codigo) from " . $this->Ini->nm_tabela . " where arc_codigo < $this->arc_codigo" . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->arc_codigo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(arc_codigo) from " . $this->Ini->nm_tabela . " where arc_codigo > $this->arc_codigo" . $str_where_filter; 
     $rs = $this->Db->Execute("select min(arc_codigo) from " . $this->Ini->nm_tabela . " where arc_codigo > $this->arc_codigo" . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->arc_codigo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
         $rs->Close(); 
         exit ; 
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(arc_codigo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
     $rs = $this->Db->Execute("select min(arc_codigo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->arc_codigo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(arc_codigo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(arc_codigo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->arc_codigo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
//
function arc_glosa_onChange($arc_codigo, $cla_codigo, $tpi_codigo)
{
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
                         
$original_tpi_codigo = $this->tpi_codigo;
$original_cla_codigo = $this->cla_codigo;
$original_arc_glosa = $this->arc_glosa;
$original_arc_comentario = $this->arc_comentario;
$original_codigo = $this->codigo;
$original_arc_codigo = $this->arc_codigo;
$original_arc_archivo = $this->arc_archivo;
$original_arc_codigo = $this->arc_codigo;
$original_cla_codigo = $this->cla_codigo;
$original_tpi_codigo = $this->tpi_codigo;
$this->carga_campos();

$modificado_tpi_codigo = $this->tpi_codigo;
$modificado_cla_codigo = $this->cla_codigo;
$modificado_arc_glosa = $this->arc_glosa;
$modificado_arc_comentario = $this->arc_comentario;
$modificado_codigo = $this->codigo;
$modificado_arc_codigo = $this->arc_codigo;
$modificado_arc_archivo = $this->arc_archivo;
$modificado_arc_codigo = $this->arc_codigo;
$modificado_cla_codigo = $this->cla_codigo;
$modificado_tpi_codigo = $this->tpi_codigo;
$this->nm_formatar_campos('tpi_codigo', 'cla_codigo', 'arc_glosa', 'arc_comentario', 'codigo', 'arc_codigo', 'arc_archivo');
if ($original_tpi_codigo !== $modificado_tpi_codigo || (isset($bFlagRead_tpi_codigo) && $bFlagRead_tpi_codigo))
{
    $this->ajax_return_values_tpi_codigo(true);
}
if ($original_cla_codigo !== $modificado_cla_codigo || (isset($bFlagRead_cla_codigo) && $bFlagRead_cla_codigo))
{
    $this->ajax_return_values_cla_codigo(true);
}
if ($original_arc_glosa !== $modificado_arc_glosa || (isset($bFlagRead_arc_glosa) && $bFlagRead_arc_glosa))
{
    $this->ajax_return_values_arc_glosa(true);
}
if ($original_arc_comentario !== $modificado_arc_comentario || (isset($bFlagRead_arc_comentario) && $bFlagRead_arc_comentario))
{
    $this->ajax_return_values_arc_comentario(true);
}
if ($original_codigo !== $modificado_codigo || (isset($bFlagRead_codigo) && $bFlagRead_codigo))
{
    $this->ajax_return_values_codigo(true);
}
if ($original_arc_codigo !== $modificado_arc_codigo || (isset($bFlagRead_arc_codigo) && $bFlagRead_arc_codigo))
{
    $this->ajax_return_values_arc_codigo(true);
}
if ($original_arc_archivo !== $modificado_arc_archivo || (isset($bFlagRead_arc_archivo) && $bFlagRead_arc_archivo))
{
    $this->ajax_return_values_arc_archivo(true);
}
if ($original_arc_codigo !== $modificado_arc_codigo || (isset($bFlagRead_arc_codigo) && $bFlagRead_arc_codigo))
{
    $this->ajax_return_values_arc_codigo(true);
}
if ($original_cla_codigo !== $modificado_cla_codigo || (isset($bFlagRead_cla_codigo) && $bFlagRead_cla_codigo))
{
    $this->ajax_return_values_cla_codigo(true);
}
if ($original_tpi_codigo !== $modificado_tpi_codigo || (isset($bFlagRead_tpi_codigo) && $bFlagRead_tpi_codigo))
{
    $this->ajax_return_values_tpi_codigo(true);
}
form_tbl_archivos_1_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
}
function carga_campos()
{
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_codigo_archivo)) {$this->sc_temp_codigo_archivo = (isset($_SESSION['codigo_archivo'])) ? $_SESSION['codigo_archivo'] : "";}
                         $this->mostrar_imagen();

$check_sql = " SELECT tbl_archivos.tpi_codigo, " 
			."        tbl_archivos.cla_codigo,  "
			."        tbl_archivos.arc_codigo,  "
			."        tbl_archivos.arc_glosa,   "
			."        tbl_archivos.arc_comentario, "
			."        tbl_archivos.arc_archivo, "
			."        tbl_clasificacion.cla_descripcion, "
			."        tbl_tipo_informacion.tpi_descripcion "
			."   FROM geo.tbl_archivos , geo.tbl_clasificacion , geo.tbl_tipo_informacion "
			."  WHERE geo.tbl_archivos.cla_codigo = geo.tbl_clasificacion.cla_codigo      " 
			."    AND geo.tbl_archivos.tpi_codigo = geo.tbl_tipo_informacion.tpi_codigo   "
			."    AND geo.tbl_archivos.tpi_codigo = ".$this->tpi_codigo .""	
		    ."    AND geo.tbl_archivos.cla_codigo = ".$this->cla_codigo .""
		    ."    AND geo.tbl_archivos.arc_codigo = ".$this->arc_glosa .""
			."  ORDER BY tbl_tipo_informacion.tpi_descripcion, tbl_clasificacion.cla_descripcion, tbl_archivos.arc_glosa ";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
 	$this->arc_comentario   = $this->rs[0][4];
    $this->codigo           = $this->rs[0][2];
	$this->arc_codigo  = $this->rs[0][2];
	$this->sc_temp_codigo_archivo  = $this->rs[0][2];
	$this->arc_archivo      = $this->rs[0][5];	
	$descargar  = $this->rs[0][5];	
}
		else     
{
	$proveedor   = 'No Existe comentario';
}
if (isset($this->sc_temp_codigo_archivo)) { $_SESSION['codigo_archivo'] = $this->sc_temp_codigo_archivo;}
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
}
function carga_campos_cla()
{
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_codigo_archivo)) {$this->sc_temp_codigo_archivo = (isset($_SESSION['codigo_archivo'])) ? $_SESSION['codigo_archivo'] : "";}
                         
$check_sql = " SELECT tbl_archivos.tpi_codigo, " 
			."        tbl_archivos.cla_codigo,  "
			."        tbl_archivos.arc_codigo,  "
			."        tbl_archivos.arc_glosa,   "
			."        tbl_archivos.arc_comentario, "
			."        tbl_archivos.arc_archivo, "
			."        tbl_clasificacion.cla_descripcion, "
			."        tbl_tipo_informacion.tpi_descripcion "
			."   FROM geo.tbl_archivos , geo.tbl_clasificacion , geo.tbl_tipo_informacion "
			."  WHERE geo.tbl_archivos.cla_codigo = geo.tbl_clasificacion.cla_codigo      " 
			."    AND geo.tbl_archivos.tpi_codigo = geo.tbl_tipo_informacion.tpi_codigo   "
			."    AND geo.tbl_archivos.tpi_codigo = ".$this->tpi_codigo .""	 
	        ."    AND geo.tbl_archivos.cla_codigo = ".$this->cla_codigo .""
	        ."  ORDER BY tbl_tipo_informacion.tpi_descripcion, tbl_clasificacion.cla_descripcion, tbl_archivos.arc_glosa ";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->tpi_codigo       = $this->rs[0][0];		
	$this->cla_codigo       = $this->rs[0][1]; 
	$this->codigo           = $this->rs[0][2];
	$this->arc_codigo  = $this->rs[0][2];
	
	$this->sc_temp_codigo_archivo  = $this->rs[0][2];
	$this->arc_comentario   = $this->rs[0][4];
	$this->arc_archivo      = $this->rs[0][5];
   $this->mostrar_imagen();
	
}
		else     
{
	$proveedor   = 'No Existe comentario';
}
if (isset($this->sc_temp_codigo_archivo)) { $_SESSION['codigo_archivo'] = $this->sc_temp_codigo_archivo;}
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
}
function carga_campos_tpi()
{
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_codigo_archivo)) {$this->sc_temp_codigo_archivo = (isset($_SESSION['codigo_archivo'])) ? $_SESSION['codigo_archivo'] : "";}
                         $this->mostrar_imagen();

$check_sql = " SELECT tbl_archivos.tpi_codigo, " 
			."        tbl_archivos.cla_codigo,  "
			."        tbl_archivos.arc_codigo,  "
			."        tbl_archivos.arc_glosa,   "
			."        tbl_archivos.arc_comentario, "
			."        tbl_archivos.arc_archivo, "
			."        tbl_clasificacion.cla_descripcion, "
			."        tbl_tipo_informacion.tpi_descripcion "
			."   FROM geo.tbl_archivos , geo.tbl_clasificacion , geo.tbl_tipo_informacion "
			."  WHERE geo.tbl_archivos.cla_codigo = geo.tbl_clasificacion.cla_codigo      " 
			."    AND geo.tbl_archivos.tpi_codigo = geo.tbl_tipo_informacion.tpi_codigo   "
			."    AND geo.tbl_archivos.tpi_codigo = ".$this->tpi_codigo .""	 
			."  ORDER BY tbl_tipo_informacion.tpi_descripcion, tbl_clasificacion.cla_descripcion, tbl_archivos.arc_glosa ";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;



if (isset($this->rs[0][0]))     
{
	$this->tpi_codigo       = $this->rs[0][0];		
	$this->cla_codigo       = $this->rs[0][1];
	$this->codigo           = $this->rs[0][2];
	$this->sc_temp_codigo_archivo  = $this->rs[0][2];
	$this->arc_codigo  = $this->rs[0][2];
	
	$this->arc_comentario   = $this->rs[0][4];
    $this->arc_archivo      = $this->rs[0][5];
}
		else     
{
	$proveedor   = 'No Existe comentario';
}
if (isset($this->sc_temp_codigo_archivo)) { $_SESSION['codigo_archivo'] = $this->sc_temp_codigo_archivo;}
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
}
function cla_codigo_onChange($cla_codigo, $tpi_codigo)
{
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
                         
$original_tpi_codigo = $this->tpi_codigo;
$original_cla_codigo = $this->cla_codigo;
$original_codigo = $this->codigo;
$original_arc_codigo = $this->arc_codigo;
$original_arc_comentario = $this->arc_comentario;
$original_arc_archivo = $this->arc_archivo;
$original_cla_codigo = $this->cla_codigo;
$original_tpi_codigo = $this->tpi_codigo;
$this->carga_campos_cla();

$modificado_tpi_codigo = $this->tpi_codigo;
$modificado_cla_codigo = $this->cla_codigo;
$modificado_codigo = $this->codigo;
$modificado_arc_codigo = $this->arc_codigo;
$modificado_arc_comentario = $this->arc_comentario;
$modificado_arc_archivo = $this->arc_archivo;
$modificado_cla_codigo = $this->cla_codigo;
$modificado_tpi_codigo = $this->tpi_codigo;
$this->nm_formatar_campos('tpi_codigo', 'cla_codigo', 'codigo', 'arc_codigo', 'arc_comentario', 'arc_archivo');
if ($original_tpi_codigo !== $modificado_tpi_codigo || (isset($bFlagRead_tpi_codigo) && $bFlagRead_tpi_codigo))
{
    $this->ajax_return_values_tpi_codigo(true);
}
if ($original_cla_codigo !== $modificado_cla_codigo || (isset($bFlagRead_cla_codigo) && $bFlagRead_cla_codigo))
{
    $this->ajax_return_values_cla_codigo(true);
}
if ($original_codigo !== $modificado_codigo || (isset($bFlagRead_codigo) && $bFlagRead_codigo))
{
    $this->ajax_return_values_codigo(true);
}
if ($original_arc_codigo !== $modificado_arc_codigo || (isset($bFlagRead_arc_codigo) && $bFlagRead_arc_codigo))
{
    $this->ajax_return_values_arc_codigo(true);
}
if ($original_arc_comentario !== $modificado_arc_comentario || (isset($bFlagRead_arc_comentario) && $bFlagRead_arc_comentario))
{
    $this->ajax_return_values_arc_comentario(true);
}
if ($original_arc_archivo !== $modificado_arc_archivo || (isset($bFlagRead_arc_archivo) && $bFlagRead_arc_archivo))
{
    $this->ajax_return_values_arc_archivo(true);
}
if ($original_cla_codigo !== $modificado_cla_codigo || (isset($bFlagRead_cla_codigo) && $bFlagRead_cla_codigo))
{
    $this->ajax_return_values_cla_codigo(true);
}
if ($original_tpi_codigo !== $modificado_tpi_codigo || (isset($bFlagRead_tpi_codigo) && $bFlagRead_tpi_codigo))
{
    $this->ajax_return_values_tpi_codigo(true);
}
form_tbl_archivos_1_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
}
function mostrar_imagen()
{
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
                         
$this->nmgp_cmp_hidden["arc_archivo"] = "on"; $this->NM_ajax_info['fieldDisplay']['arc_archivo'] = 'on';
$this->nmgp_cmp_hidden["mapa"] = "off"; $this->NM_ajax_info['fieldDisplay']['mapa'] = 'off';
$this->nmgp_cmp_hidden["simbologia"] = "off"; $this->NM_ajax_info['fieldDisplay']['simbologia'] = 'off';
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
}
function mostrar_mapa()
{
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
                         
$this->nmgp_cmp_hidden["mapa"] = "on"; $this->NM_ajax_info['fieldDisplay']['mapa'] = 'on';
$this->nmgp_cmp_hidden["arc_archivo"] = "off"; $this->NM_ajax_info['fieldDisplay']['arc_archivo'] = 'off';
$this->nmgp_cmp_hidden["simbologia"] = "on"; $this->NM_ajax_info['fieldDisplay']['simbologia'] = 'on';
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
}
function pasword_onChange()
{
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_pass)) {$this->sc_temp_pass = (isset($_SESSION['pass'])) ? $_SESSION['pass'] : "";}
                         
$original_pasword = $this->pasword;

$this->sc_temp_pass=$this->pasword ;


if (isset($this->sc_temp_pass)) { $_SESSION['pass'] = $this->sc_temp_pass;}
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
$modificado_pasword = $this->pasword;
$this->nm_formatar_campos('pasword');
if ($original_pasword !== $modificado_pasword || (isset($bFlagRead_pasword) && $bFlagRead_pasword))
{
    $this->ajax_return_values_pasword(true);
}
form_tbl_archivos_1_mob_pack_ajax_response();
exit;
}
function tpi_codigo_onChange($arc_codigo)
{
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
                         
$original_tpi_codigo = $this->tpi_codigo;
$original_cla_codigo = $this->cla_codigo;
$original_codigo = $this->codigo;
$original_arc_codigo = $this->arc_codigo;
$original_arc_comentario = $this->arc_comentario;
$original_arc_archivo = $this->arc_archivo;
$original_arc_codigo = $this->arc_codigo;
$this->carga_campos_tpi();

$modificado_tpi_codigo = $this->tpi_codigo;
$modificado_cla_codigo = $this->cla_codigo;
$modificado_codigo = $this->codigo;
$modificado_arc_codigo = $this->arc_codigo;
$modificado_arc_comentario = $this->arc_comentario;
$modificado_arc_archivo = $this->arc_archivo;
$modificado_arc_codigo = $this->arc_codigo;
$this->nm_formatar_campos('tpi_codigo', 'cla_codigo', 'codigo', 'arc_codigo', 'arc_comentario', 'arc_archivo');
if ($original_tpi_codigo !== $modificado_tpi_codigo || (isset($bFlagRead_tpi_codigo) && $bFlagRead_tpi_codigo))
{
    $this->ajax_return_values_tpi_codigo(true);
}
if ($original_cla_codigo !== $modificado_cla_codigo || (isset($bFlagRead_cla_codigo) && $bFlagRead_cla_codigo))
{
    $this->ajax_return_values_cla_codigo(true);
}
if ($original_codigo !== $modificado_codigo || (isset($bFlagRead_codigo) && $bFlagRead_codigo))
{
    $this->ajax_return_values_codigo(true);
}
if ($original_arc_codigo !== $modificado_arc_codigo || (isset($bFlagRead_arc_codigo) && $bFlagRead_arc_codigo))
{
    $this->ajax_return_values_arc_codigo(true);
}
if ($original_arc_comentario !== $modificado_arc_comentario || (isset($bFlagRead_arc_comentario) && $bFlagRead_arc_comentario))
{
    $this->ajax_return_values_arc_comentario(true);
}
if ($original_arc_archivo !== $modificado_arc_archivo || (isset($bFlagRead_arc_archivo) && $bFlagRead_arc_archivo))
{
    $this->ajax_return_values_arc_archivo(true);
}
if ($original_arc_codigo !== $modificado_arc_codigo || (isset($bFlagRead_arc_codigo) && $bFlagRead_arc_codigo))
{
    $this->ajax_return_values_arc_codigo(true);
}
form_tbl_archivos_1_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
}
function usuario_onChange()
{
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_user)) {$this->sc_temp_user = (isset($_SESSION['user'])) ? $_SESSION['user'] : "";}
                         
$original_usuario = $this->usuario;

$this->sc_temp_user=$this->usuario ;


if (isset($this->sc_temp_user)) { $_SESSION['user'] = $this->sc_temp_user;}
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
$modificado_usuario = $this->usuario;
$this->nm_formatar_campos('usuario');
if ($original_usuario !== $modificado_usuario || (isset($bFlagRead_usuario) && $bFlagRead_usuario))
{
    $this->ajax_return_values_usuario(true);
}
form_tbl_archivos_1_mob_pack_ajax_response();
exit;
}
function scajaxbutton_ver_mapa_onClick()
{
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
                         
$original_mapa = $this->mapa;
$original_arc_archivo = $this->arc_archivo;
$original_simbologia = $this->simbologia;
$this->mostrar_mapa();

$modificado_mapa = $this->mapa;
$modificado_arc_archivo = $this->arc_archivo;
$modificado_simbologia = $this->simbologia;
$this->nm_formatar_campos('mapa', 'arc_archivo', 'simbologia');
if ($original_mapa !== $modificado_mapa || (isset($bFlagRead_mapa) && $bFlagRead_mapa))
{
    $this->ajax_return_values_mapa(true);
}
if ($original_arc_archivo !== $modificado_arc_archivo || (isset($bFlagRead_arc_archivo) && $bFlagRead_arc_archivo))
{
    $this->ajax_return_values_arc_archivo(true);
}
if ($original_simbologia !== $modificado_simbologia || (isset($bFlagRead_simbologia) && $bFlagRead_simbologia))
{
    $this->ajax_return_values_simbologia(true);
}
form_tbl_archivos_1_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
}
function scajaxbutton_ver_imagen_onClick()
{
$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'on';
                         
$original_arc_archivo = $this->arc_archivo;
$original_mapa = $this->mapa;
$original_simbologia = $this->simbologia;
$this->mostrar_imagen();

$modificado_arc_archivo = $this->arc_archivo;
$modificado_mapa = $this->mapa;
$modificado_simbologia = $this->simbologia;
$this->nm_formatar_campos('arc_archivo', 'mapa', 'simbologia');
if ($original_arc_archivo !== $modificado_arc_archivo || (isset($bFlagRead_arc_archivo) && $bFlagRead_arc_archivo))
{
    $this->ajax_return_values_arc_archivo(true);
}
if ($original_mapa !== $modificado_mapa || (isset($bFlagRead_mapa) && $bFlagRead_mapa))
{
    $this->ajax_return_values_mapa(true);
}
if ($original_simbologia !== $modificado_simbologia || (isset($bFlagRead_simbologia) && $bFlagRead_simbologia))
{
    $this->ajax_return_values_simbologia(true);
}
form_tbl_archivos_1_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_tbl_archivos_1_mob']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_tbl_archivos_1_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_arc_archivo = "";  
   } 
   else 
   { 
       $out_arc_archivo = $this->arc_archivo;  
   } 
   if ($this->arc_archivo != "" && $this->arc_archivo != "none")   
   { 
       $out_arc_archivo = $this->Ini->path_imag_temp . "/sc_arc_archivo_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $arq_arc_archivo = fopen($this->Ini->root . $out_arc_archivo, "w") ;  
       if (substr($this->arc_archivo, 0, 4) == "*nm*") 
       { 
           $this->arc_archivo = substr($this->arc_archivo, 4) ; 
           $this->arc_archivo = base64_decode($this->arc_archivo) ; 
       } 
       $img_pos_bm = strpos($this->arc_archivo, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->arc_archivo = substr($this->arc_archivo, $img_pos_bm) ; 
       } 
       fwrite($arq_arc_archivo, $this->arc_archivo) ;  
       fclose($arq_arc_archivo) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_arc_archivo);
       $this->nmgp_return_img['arc_archivo'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['arc_archivo'][1] = $sc_obj_img->getWidth();
       $out1_arc_archivo = $out_arc_archivo; 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       $out_arc_archivo = $this->Ini->path_imag_temp . "/sc_" . "arc_archivo_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_arc_archivo);
           $sc_obj_img->setWidth(600);
           $sc_obj_img->setHeight(800);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_arc_archivo);
       } 
       else 
       { 
           $out_arc_archivo = $out1_arc_archivo;
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_arc_archivo;
       if (isset($temp_out_arc_archivo))
       {
           $out_arc_archivo = $temp_out_arc_archivo;
       }
       global $temp_out1_arc_archivo;
       if (isset($temp_out1_arc_archivo))
       {
           $out1_arc_archivo = $temp_out1_arc_archivo;
       }
   }
    include_once("form_tbl_archivos_1_mob_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_tbl_archivos_1_mob_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_tpi_codigo($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "tpi_codigo", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_cla_codigo($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "cla_codigo", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "arc_codigo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_arc_glosa($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "arc_glosa", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "arc_comentario", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "arc_archivo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "arc_comentario", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_tpi_codigo($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "tpi_codigo", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_cla_codigo($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "cla_codigo", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_arc_glosa($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "arc_glosa", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "arc_codigo", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_tbl_archivos_1_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['total'] = $qt_geral_reg_form_tbl_archivos_1_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbl_archivos_1_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbl_archivos_1_mob_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "tpi_codigo";$nm_numeric[] = "cla_codigo";$nm_numeric[] = "arc_codigo";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas1;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
            break;
         }
   }
   function SC_lookup_tpi_codigo($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT tpi_descripcion, tpi_codigo FROM tbl_tipo_informacion WHERE (tpi_descripcion LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_cla_codigo($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT cla_descripcion, cla_codigo, tpi_codigo FROM tbl_clasificacion WHERE (cla_descripcion LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_arc_glosa($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT arc_glosa, arc_codigo, tbl_archivos.tpi_codigo, tbl_archivos.cla_codigo FROM tbl_archivos WHERE (arc_glosa LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_tbl_archivos_1_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_tbl_archivos_1_mob_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = '_self';
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_tbl_archivos_1_mob_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['masterValue']);
?>
}
<?php
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_archivos_1_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_tbl_archivos_1_mob_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
           $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       }
       form_tbl_archivos_1_mob_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&script_case_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&script_case_session=<?php echo session_id() ?> &nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
   </BODY>
   </HTML>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
}
?>
