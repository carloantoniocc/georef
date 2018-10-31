<?php
//
class archivos_apl
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
                                'navSummary'     => array(),
                                'navPage'        => array(),
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
   var $tpi_codigo_;
   var $tpi_codigo__1;
   var $cla_codigo_;
   var $cla_codigo__1;
   var $arc_codigo_;
   var $arc_glosa_;
   var $arc_comentario_;
   var $arc_archivo_;
   var $arc_archivo__scfile_name;
   var $arc_archivo__ul_name;
   var $arc_archivo__scfile_type;
   var $arc_archivo__ul_type;
   var $arc_archivo__limpa;
   var $arc_archivo__salva;
   var $out_arc_archivo_;
   var $out1_arc_archivo_;
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
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_max_reg = 50; 
   var $sc_max_reg_incl = 10; 
   var $form_vert_archivos = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = true;
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
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['arc_archivo_']))
          {
              $this->arc_archivo_ = $this->NM_ajax_info['param']['arc_archivo_'];
          }
          if (isset($this->NM_ajax_info['param']['arc_archivo__limpa']))
          {
              $this->arc_archivo__limpa = $this->NM_ajax_info['param']['arc_archivo__limpa'];
          }
          if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name']))
          {
              $this->arc_archivo__ul_name = $this->NM_ajax_info['param']['arc_archivo__ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['arc_archivo__ul_type']))
          {
              $this->arc_archivo__ul_type = $this->NM_ajax_info['param']['arc_archivo__ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['arc_codigo_']))
          {
              $this->arc_codigo_ = $this->NM_ajax_info['param']['arc_codigo_'];
          }
          if (isset($this->NM_ajax_info['param']['arc_comentario_']))
          {
              $this->arc_comentario_ = $this->NM_ajax_info['param']['arc_comentario_'];
          }
          if (isset($this->NM_ajax_info['param']['arc_glosa_']))
          {
              $this->arc_glosa_ = $this->NM_ajax_info['param']['arc_glosa_'];
          }
          if (isset($this->NM_ajax_info['param']['cla_codigo_']))
          {
              $this->cla_codigo_ = $this->NM_ajax_info['param']['cla_codigo_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['sc_clone']))
          {
              $this->sc_clone = $this->NM_ajax_info['param']['sc_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_clone']))
          {
              $this->sc_seq_clone = $this->NM_ajax_info['param']['sc_seq_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tpi_codigo_']))
          {
              $this->tpi_codigo_ = $this->NM_ajax_info['param']['tpi_codigo_'];
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
      $this->sc_conv_var['tpi_codigo'] = "tpi_codigo_";
      $this->sc_conv_var['cla_codigo'] = "cla_codigo_";
      $this->sc_conv_var['arc_codigo'] = "arc_codigo_";
      $this->sc_conv_var['arc_glosa'] = "arc_glosa_";
      $this->sc_conv_var['arc_comentario'] = "arc_comentario_";
      $this->sc_conv_var['arc_archivo'] = "arc_archivo_";
      if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_add_dyn_search" || $_POST['nmgp_opcao'] == "ajax_ch_bi_dyn_search"))
      {
          ob_start();
      }
      if (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "ajax_aut_comp_dyn_search")
      {
          ob_start();
      }
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
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['archivos']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['archivos']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['archivos']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['archivos']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $this->NM_where_filter = "";
          $tem_where_parms       = false;
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
                 nm_limpa_str_archivos($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
                 if ($cadapar[0] == "arc_codigo_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "arc_codigo = " . $this->arc_codigo_;
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
             }
             $ix++;
          }
          if ($tem_where_parms)
          {
              $this->NM_where_filter .= ")";
          }
          elseif (empty($this->NM_where_filter))
          {
              unset($this->NM_where_filter);
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['archivos']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['archivos']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['archivos']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['archivos']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['archivos']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['archivos']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['archivos']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['archivos']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['archivos']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['archivos']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['archivos']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['archivos']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['archivos']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new archivos_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['archivos']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['archivos']['upload_field_info']['arc_archivo_'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'archivos',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_file_height' => '100',
          'upload_file_width'  => '100',
          'upload_file_aspect' => 'N',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['archivos']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['archivos'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['archivos']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['archivos']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('archivos') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['archivos']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tbl_archivos";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "archivos")
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
      $this->Ini->Str_btn_form    = trim($str_button);
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
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok_mult)   ? ""     : $str_img_status_ok_mult;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err_mult)  ? ""     : $str_img_status_err_mult;
      $this->Ini->Css_status      = "scFormInputErrorMult";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);

      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_add_dyn_search")
      {
          $Temp = ob_get_clean();
          ob_start();
          $NM_func_dyn_add = "dynamic_search_" . $_POST['parm'];
          $Lin_dyn_add = $this->$NM_func_dyn_add($_POST['seq'], 'S');
          $this->Arr_result = array();
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $this->Arr_result['dyn_add'][] = NM_charset_to_utf8($Lin_dyn_add);
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      if (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "ajax_aut_comp_dyn_search")
      {
          $Temp = ob_get_clean();
          ob_start();
          $NM_func_aut_comp = "lookup_ajax_" . $_GET['field'];
          $parm = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->$NM_func_aut_comp($parm);
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_aut_comp']);
          exit;
      }

      $this->arr_buttons['tipo_info']['hint']             = "";
      $this->arr_buttons['tipo_info']['type']             = "button";
      $this->arr_buttons['tipo_info']['value']            = "Tipo información";
      $this->arr_buttons['tipo_info']['display']          = "only_text";
      $this->arr_buttons['tipo_info']['display_position'] = "text_right";
      $this->arr_buttons['tipo_info']['style']            = "default";
      $this->arr_buttons['tipo_info']['image']            = "";

      $this->arr_buttons['sc_btn_0']['hint']             = "";
      $this->arr_buttons['sc_btn_0']['type']             = "button";
      $this->arr_buttons['sc_btn_0']['value']            = "Tipo Clasificación";
      $this->arr_buttons['sc_btn_0']['display']          = "only_text";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "default";
      $this->arr_buttons['sc_btn_0']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['archivos']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['archivos'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name];
          }
          $this->arc_archivo_ = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name'];
          $this->arc_archivo__scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name'], 12);
          $this->arc_archivo__scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type'];
          $this->arc_archivo__ul_name = $this->NM_ajax_info['param']['arc_archivo__ul_name'];
          $this->arc_archivo__ul_type = $this->NM_ajax_info['param']['arc_archivo__ul_type'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_             = sc_convert_encoding($this->arc_archivo_,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo__scfile_name = sc_convert_encoding($this->arc_archivo__scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo__ul_name     = sc_convert_encoding($this->arc_archivo__ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name) && '' != $this->arc_archivo__ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name]))
          {
              $this->arc_archivo__ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name];
          }
          $this->arc_archivo_ = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name;
          $this->arc_archivo__scfile_name = substr($this->arc_archivo__ul_name, 12);
          $this->arc_archivo__scfile_type = $this->arc_archivo__ul_type;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_             = sc_convert_encoding($this->arc_archivo_,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo__scfile_name = sc_convert_encoding($this->arc_archivo__scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo__ul_name     = sc_convert_encoding($this->arc_archivo__ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name1']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name1'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name1]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name1'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name1];
          }
          $this->arc_archivo_1      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name1'];
          $this->arc_archivo_1_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name1'], 12);
          $this->arc_archivo_1_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type1'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_1             = sc_convert_encoding($this->arc_archivo_1,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_1_scfile_name = sc_convert_encoding($this->arc_archivo_1_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_1_ul_name     = sc_convert_encoding($this->arc_archivo_1_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name1) && '' != $this->arc_archivo__ul_name1)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name1]))
          {
              $this->arc_archivo__ul_name1 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name1];
          }
          $this->arc_archivo_1      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name1;
          $this->arc_archivo_1_scfile_name = substr($this->arc_archivo__ul_name1, 12);
          $this->arc_archivo_1_scfile_type = $this->arc_archivo__ul_type1;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_1             = sc_convert_encoding($this->arc_archivo_1,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_1_scfile_name = sc_convert_encoding($this->arc_archivo_1_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_1_ul_name     = sc_convert_encoding($this->arc_archivo_1_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_1))
      {
          $GLOBALS['arc_archivo_1']      = $this->arc_archivo_1;
          $GLOBALS['arc_archivo_1_scfile_name'] = $this->arc_archivo_1_scfile_name;
          $GLOBALS['arc_archivo_1_scfile_type'] = $this->arc_archivo_1_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name2']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name2'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name2]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name2'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name2];
          }
          $this->arc_archivo_2      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name2'];
          $this->arc_archivo_2_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name2'], 12);
          $this->arc_archivo_2_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type2'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_2             = sc_convert_encoding($this->arc_archivo_2,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_2_scfile_name = sc_convert_encoding($this->arc_archivo_2_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_2_ul_name     = sc_convert_encoding($this->arc_archivo_2_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name2) && '' != $this->arc_archivo__ul_name2)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name2]))
          {
              $this->arc_archivo__ul_name2 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name2];
          }
          $this->arc_archivo_2      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name2;
          $this->arc_archivo_2_scfile_name = substr($this->arc_archivo__ul_name2, 12);
          $this->arc_archivo_2_scfile_type = $this->arc_archivo__ul_type2;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_2             = sc_convert_encoding($this->arc_archivo_2,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_2_scfile_name = sc_convert_encoding($this->arc_archivo_2_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_2_ul_name     = sc_convert_encoding($this->arc_archivo_2_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_2))
      {
          $GLOBALS['arc_archivo_2']      = $this->arc_archivo_2;
          $GLOBALS['arc_archivo_2_scfile_name'] = $this->arc_archivo_2_scfile_name;
          $GLOBALS['arc_archivo_2_scfile_type'] = $this->arc_archivo_2_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name3']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name3'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name3]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name3'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name3];
          }
          $this->arc_archivo_3      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name3'];
          $this->arc_archivo_3_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name3'], 12);
          $this->arc_archivo_3_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type3'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_3             = sc_convert_encoding($this->arc_archivo_3,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_3_scfile_name = sc_convert_encoding($this->arc_archivo_3_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_3_ul_name     = sc_convert_encoding($this->arc_archivo_3_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name3) && '' != $this->arc_archivo__ul_name3)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name3]))
          {
              $this->arc_archivo__ul_name3 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name3];
          }
          $this->arc_archivo_3      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name3;
          $this->arc_archivo_3_scfile_name = substr($this->arc_archivo__ul_name3, 12);
          $this->arc_archivo_3_scfile_type = $this->arc_archivo__ul_type3;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_3             = sc_convert_encoding($this->arc_archivo_3,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_3_scfile_name = sc_convert_encoding($this->arc_archivo_3_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_3_ul_name     = sc_convert_encoding($this->arc_archivo_3_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_3))
      {
          $GLOBALS['arc_archivo_3']      = $this->arc_archivo_3;
          $GLOBALS['arc_archivo_3_scfile_name'] = $this->arc_archivo_3_scfile_name;
          $GLOBALS['arc_archivo_3_scfile_type'] = $this->arc_archivo_3_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name4']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name4'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name4]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name4'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name4];
          }
          $this->arc_archivo_4      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name4'];
          $this->arc_archivo_4_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name4'], 12);
          $this->arc_archivo_4_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type4'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_4             = sc_convert_encoding($this->arc_archivo_4,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_4_scfile_name = sc_convert_encoding($this->arc_archivo_4_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_4_ul_name     = sc_convert_encoding($this->arc_archivo_4_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name4) && '' != $this->arc_archivo__ul_name4)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name4]))
          {
              $this->arc_archivo__ul_name4 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name4];
          }
          $this->arc_archivo_4      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name4;
          $this->arc_archivo_4_scfile_name = substr($this->arc_archivo__ul_name4, 12);
          $this->arc_archivo_4_scfile_type = $this->arc_archivo__ul_type4;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_4             = sc_convert_encoding($this->arc_archivo_4,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_4_scfile_name = sc_convert_encoding($this->arc_archivo_4_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_4_ul_name     = sc_convert_encoding($this->arc_archivo_4_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_4))
      {
          $GLOBALS['arc_archivo_4']      = $this->arc_archivo_4;
          $GLOBALS['arc_archivo_4_scfile_name'] = $this->arc_archivo_4_scfile_name;
          $GLOBALS['arc_archivo_4_scfile_type'] = $this->arc_archivo_4_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name5']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name5'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name5]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name5'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name5];
          }
          $this->arc_archivo_5      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name5'];
          $this->arc_archivo_5_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name5'], 12);
          $this->arc_archivo_5_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type5'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_5             = sc_convert_encoding($this->arc_archivo_5,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_5_scfile_name = sc_convert_encoding($this->arc_archivo_5_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_5_ul_name     = sc_convert_encoding($this->arc_archivo_5_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name5) && '' != $this->arc_archivo__ul_name5)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name5]))
          {
              $this->arc_archivo__ul_name5 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name5];
          }
          $this->arc_archivo_5      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name5;
          $this->arc_archivo_5_scfile_name = substr($this->arc_archivo__ul_name5, 12);
          $this->arc_archivo_5_scfile_type = $this->arc_archivo__ul_type5;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_5             = sc_convert_encoding($this->arc_archivo_5,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_5_scfile_name = sc_convert_encoding($this->arc_archivo_5_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_5_ul_name     = sc_convert_encoding($this->arc_archivo_5_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_5))
      {
          $GLOBALS['arc_archivo_5']      = $this->arc_archivo_5;
          $GLOBALS['arc_archivo_5_scfile_name'] = $this->arc_archivo_5_scfile_name;
          $GLOBALS['arc_archivo_5_scfile_type'] = $this->arc_archivo_5_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name6']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name6'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name6]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name6'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name6];
          }
          $this->arc_archivo_6      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name6'];
          $this->arc_archivo_6_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name6'], 12);
          $this->arc_archivo_6_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type6'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_6             = sc_convert_encoding($this->arc_archivo_6,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_6_scfile_name = sc_convert_encoding($this->arc_archivo_6_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_6_ul_name     = sc_convert_encoding($this->arc_archivo_6_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name6) && '' != $this->arc_archivo__ul_name6)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name6]))
          {
              $this->arc_archivo__ul_name6 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name6];
          }
          $this->arc_archivo_6      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name6;
          $this->arc_archivo_6_scfile_name = substr($this->arc_archivo__ul_name6, 12);
          $this->arc_archivo_6_scfile_type = $this->arc_archivo__ul_type6;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_6             = sc_convert_encoding($this->arc_archivo_6,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_6_scfile_name = sc_convert_encoding($this->arc_archivo_6_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_6_ul_name     = sc_convert_encoding($this->arc_archivo_6_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_6))
      {
          $GLOBALS['arc_archivo_6']      = $this->arc_archivo_6;
          $GLOBALS['arc_archivo_6_scfile_name'] = $this->arc_archivo_6_scfile_name;
          $GLOBALS['arc_archivo_6_scfile_type'] = $this->arc_archivo_6_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name7']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name7'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name7]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name7'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name7];
          }
          $this->arc_archivo_7      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name7'];
          $this->arc_archivo_7_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name7'], 12);
          $this->arc_archivo_7_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type7'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_7             = sc_convert_encoding($this->arc_archivo_7,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_7_scfile_name = sc_convert_encoding($this->arc_archivo_7_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_7_ul_name     = sc_convert_encoding($this->arc_archivo_7_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name7) && '' != $this->arc_archivo__ul_name7)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name7]))
          {
              $this->arc_archivo__ul_name7 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name7];
          }
          $this->arc_archivo_7      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name7;
          $this->arc_archivo_7_scfile_name = substr($this->arc_archivo__ul_name7, 12);
          $this->arc_archivo_7_scfile_type = $this->arc_archivo__ul_type7;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_7             = sc_convert_encoding($this->arc_archivo_7,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_7_scfile_name = sc_convert_encoding($this->arc_archivo_7_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_7_ul_name     = sc_convert_encoding($this->arc_archivo_7_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_7))
      {
          $GLOBALS['arc_archivo_7']      = $this->arc_archivo_7;
          $GLOBALS['arc_archivo_7_scfile_name'] = $this->arc_archivo_7_scfile_name;
          $GLOBALS['arc_archivo_7_scfile_type'] = $this->arc_archivo_7_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name8']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name8'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name8]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name8'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name8];
          }
          $this->arc_archivo_8      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name8'];
          $this->arc_archivo_8_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name8'], 12);
          $this->arc_archivo_8_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type8'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_8             = sc_convert_encoding($this->arc_archivo_8,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_8_scfile_name = sc_convert_encoding($this->arc_archivo_8_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_8_ul_name     = sc_convert_encoding($this->arc_archivo_8_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name8) && '' != $this->arc_archivo__ul_name8)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name8]))
          {
              $this->arc_archivo__ul_name8 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name8];
          }
          $this->arc_archivo_8      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name8;
          $this->arc_archivo_8_scfile_name = substr($this->arc_archivo__ul_name8, 12);
          $this->arc_archivo_8_scfile_type = $this->arc_archivo__ul_type8;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_8             = sc_convert_encoding($this->arc_archivo_8,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_8_scfile_name = sc_convert_encoding($this->arc_archivo_8_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_8_ul_name     = sc_convert_encoding($this->arc_archivo_8_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_8))
      {
          $GLOBALS['arc_archivo_8']      = $this->arc_archivo_8;
          $GLOBALS['arc_archivo_8_scfile_name'] = $this->arc_archivo_8_scfile_name;
          $GLOBALS['arc_archivo_8_scfile_type'] = $this->arc_archivo_8_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name9']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name9'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name9]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name9'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name9];
          }
          $this->arc_archivo_9      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name9'];
          $this->arc_archivo_9_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name9'], 12);
          $this->arc_archivo_9_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type9'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_9             = sc_convert_encoding($this->arc_archivo_9,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_9_scfile_name = sc_convert_encoding($this->arc_archivo_9_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_9_ul_name     = sc_convert_encoding($this->arc_archivo_9_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name9) && '' != $this->arc_archivo__ul_name9)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name9]))
          {
              $this->arc_archivo__ul_name9 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name9];
          }
          $this->arc_archivo_9      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name9;
          $this->arc_archivo_9_scfile_name = substr($this->arc_archivo__ul_name9, 12);
          $this->arc_archivo_9_scfile_type = $this->arc_archivo__ul_type9;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_9             = sc_convert_encoding($this->arc_archivo_9,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_9_scfile_name = sc_convert_encoding($this->arc_archivo_9_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_9_ul_name     = sc_convert_encoding($this->arc_archivo_9_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_9))
      {
          $GLOBALS['arc_archivo_9']      = $this->arc_archivo_9;
          $GLOBALS['arc_archivo_9_scfile_name'] = $this->arc_archivo_9_scfile_name;
          $GLOBALS['arc_archivo_9_scfile_type'] = $this->arc_archivo_9_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name10']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name10'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name10]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name10'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name10];
          }
          $this->arc_archivo_10      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name10'];
          $this->arc_archivo_10_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name10'], 12);
          $this->arc_archivo_10_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type10'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_10             = sc_convert_encoding($this->arc_archivo_10,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_10_scfile_name = sc_convert_encoding($this->arc_archivo_10_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_10_ul_name     = sc_convert_encoding($this->arc_archivo_10_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name10) && '' != $this->arc_archivo__ul_name10)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name10]))
          {
              $this->arc_archivo__ul_name10 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name10];
          }
          $this->arc_archivo_10      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name10;
          $this->arc_archivo_10_scfile_name = substr($this->arc_archivo__ul_name10, 12);
          $this->arc_archivo_10_scfile_type = $this->arc_archivo__ul_type10;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_10             = sc_convert_encoding($this->arc_archivo_10,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_10_scfile_name = sc_convert_encoding($this->arc_archivo_10_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_10_ul_name     = sc_convert_encoding($this->arc_archivo_10_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_10))
      {
          $GLOBALS['arc_archivo_10']      = $this->arc_archivo_10;
          $GLOBALS['arc_archivo_10_scfile_name'] = $this->arc_archivo_10_scfile_name;
          $GLOBALS['arc_archivo_10_scfile_type'] = $this->arc_archivo_10_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name11']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name11'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name11]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name11'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name11];
          }
          $this->arc_archivo_11      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name11'];
          $this->arc_archivo_11_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name11'], 12);
          $this->arc_archivo_11_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type11'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_11             = sc_convert_encoding($this->arc_archivo_11,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_11_scfile_name = sc_convert_encoding($this->arc_archivo_11_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_11_ul_name     = sc_convert_encoding($this->arc_archivo_11_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name11) && '' != $this->arc_archivo__ul_name11)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name11]))
          {
              $this->arc_archivo__ul_name11 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name11];
          }
          $this->arc_archivo_11      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name11;
          $this->arc_archivo_11_scfile_name = substr($this->arc_archivo__ul_name11, 12);
          $this->arc_archivo_11_scfile_type = $this->arc_archivo__ul_type11;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_11             = sc_convert_encoding($this->arc_archivo_11,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_11_scfile_name = sc_convert_encoding($this->arc_archivo_11_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_11_ul_name     = sc_convert_encoding($this->arc_archivo_11_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_11))
      {
          $GLOBALS['arc_archivo_11']      = $this->arc_archivo_11;
          $GLOBALS['arc_archivo_11_scfile_name'] = $this->arc_archivo_11_scfile_name;
          $GLOBALS['arc_archivo_11_scfile_type'] = $this->arc_archivo_11_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name12']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name12'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name12]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name12'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name12];
          }
          $this->arc_archivo_12      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name12'];
          $this->arc_archivo_12_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name12'], 12);
          $this->arc_archivo_12_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type12'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_12             = sc_convert_encoding($this->arc_archivo_12,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_12_scfile_name = sc_convert_encoding($this->arc_archivo_12_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_12_ul_name     = sc_convert_encoding($this->arc_archivo_12_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name12) && '' != $this->arc_archivo__ul_name12)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name12]))
          {
              $this->arc_archivo__ul_name12 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name12];
          }
          $this->arc_archivo_12      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name12;
          $this->arc_archivo_12_scfile_name = substr($this->arc_archivo__ul_name12, 12);
          $this->arc_archivo_12_scfile_type = $this->arc_archivo__ul_type12;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_12             = sc_convert_encoding($this->arc_archivo_12,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_12_scfile_name = sc_convert_encoding($this->arc_archivo_12_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_12_ul_name     = sc_convert_encoding($this->arc_archivo_12_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_12))
      {
          $GLOBALS['arc_archivo_12']      = $this->arc_archivo_12;
          $GLOBALS['arc_archivo_12_scfile_name'] = $this->arc_archivo_12_scfile_name;
          $GLOBALS['arc_archivo_12_scfile_type'] = $this->arc_archivo_12_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name13']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name13'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name13]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name13'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name13];
          }
          $this->arc_archivo_13      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name13'];
          $this->arc_archivo_13_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name13'], 12);
          $this->arc_archivo_13_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type13'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_13             = sc_convert_encoding($this->arc_archivo_13,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_13_scfile_name = sc_convert_encoding($this->arc_archivo_13_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_13_ul_name     = sc_convert_encoding($this->arc_archivo_13_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name13) && '' != $this->arc_archivo__ul_name13)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name13]))
          {
              $this->arc_archivo__ul_name13 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name13];
          }
          $this->arc_archivo_13      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name13;
          $this->arc_archivo_13_scfile_name = substr($this->arc_archivo__ul_name13, 12);
          $this->arc_archivo_13_scfile_type = $this->arc_archivo__ul_type13;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_13             = sc_convert_encoding($this->arc_archivo_13,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_13_scfile_name = sc_convert_encoding($this->arc_archivo_13_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_13_ul_name     = sc_convert_encoding($this->arc_archivo_13_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_13))
      {
          $GLOBALS['arc_archivo_13']      = $this->arc_archivo_13;
          $GLOBALS['arc_archivo_13_scfile_name'] = $this->arc_archivo_13_scfile_name;
          $GLOBALS['arc_archivo_13_scfile_type'] = $this->arc_archivo_13_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name14']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name14'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name14]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name14'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name14];
          }
          $this->arc_archivo_14      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name14'];
          $this->arc_archivo_14_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name14'], 12);
          $this->arc_archivo_14_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type14'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_14             = sc_convert_encoding($this->arc_archivo_14,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_14_scfile_name = sc_convert_encoding($this->arc_archivo_14_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_14_ul_name     = sc_convert_encoding($this->arc_archivo_14_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name14) && '' != $this->arc_archivo__ul_name14)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name14]))
          {
              $this->arc_archivo__ul_name14 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name14];
          }
          $this->arc_archivo_14      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name14;
          $this->arc_archivo_14_scfile_name = substr($this->arc_archivo__ul_name14, 12);
          $this->arc_archivo_14_scfile_type = $this->arc_archivo__ul_type14;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_14             = sc_convert_encoding($this->arc_archivo_14,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_14_scfile_name = sc_convert_encoding($this->arc_archivo_14_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_14_ul_name     = sc_convert_encoding($this->arc_archivo_14_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_14))
      {
          $GLOBALS['arc_archivo_14']      = $this->arc_archivo_14;
          $GLOBALS['arc_archivo_14_scfile_name'] = $this->arc_archivo_14_scfile_name;
          $GLOBALS['arc_archivo_14_scfile_type'] = $this->arc_archivo_14_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name15']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name15'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name15]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name15'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name15];
          }
          $this->arc_archivo_15      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name15'];
          $this->arc_archivo_15_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name15'], 12);
          $this->arc_archivo_15_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type15'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_15             = sc_convert_encoding($this->arc_archivo_15,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_15_scfile_name = sc_convert_encoding($this->arc_archivo_15_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_15_ul_name     = sc_convert_encoding($this->arc_archivo_15_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name15) && '' != $this->arc_archivo__ul_name15)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name15]))
          {
              $this->arc_archivo__ul_name15 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name15];
          }
          $this->arc_archivo_15      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name15;
          $this->arc_archivo_15_scfile_name = substr($this->arc_archivo__ul_name15, 12);
          $this->arc_archivo_15_scfile_type = $this->arc_archivo__ul_type15;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_15             = sc_convert_encoding($this->arc_archivo_15,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_15_scfile_name = sc_convert_encoding($this->arc_archivo_15_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_15_ul_name     = sc_convert_encoding($this->arc_archivo_15_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_15))
      {
          $GLOBALS['arc_archivo_15']      = $this->arc_archivo_15;
          $GLOBALS['arc_archivo_15_scfile_name'] = $this->arc_archivo_15_scfile_name;
          $GLOBALS['arc_archivo_15_scfile_type'] = $this->arc_archivo_15_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name16']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name16'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name16]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name16'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name16];
          }
          $this->arc_archivo_16      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name16'];
          $this->arc_archivo_16_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name16'], 12);
          $this->arc_archivo_16_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type16'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_16             = sc_convert_encoding($this->arc_archivo_16,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_16_scfile_name = sc_convert_encoding($this->arc_archivo_16_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_16_ul_name     = sc_convert_encoding($this->arc_archivo_16_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name16) && '' != $this->arc_archivo__ul_name16)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name16]))
          {
              $this->arc_archivo__ul_name16 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name16];
          }
          $this->arc_archivo_16      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name16;
          $this->arc_archivo_16_scfile_name = substr($this->arc_archivo__ul_name16, 12);
          $this->arc_archivo_16_scfile_type = $this->arc_archivo__ul_type16;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_16             = sc_convert_encoding($this->arc_archivo_16,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_16_scfile_name = sc_convert_encoding($this->arc_archivo_16_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_16_ul_name     = sc_convert_encoding($this->arc_archivo_16_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_16))
      {
          $GLOBALS['arc_archivo_16']      = $this->arc_archivo_16;
          $GLOBALS['arc_archivo_16_scfile_name'] = $this->arc_archivo_16_scfile_name;
          $GLOBALS['arc_archivo_16_scfile_type'] = $this->arc_archivo_16_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name17']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name17'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name17]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name17'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name17];
          }
          $this->arc_archivo_17      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name17'];
          $this->arc_archivo_17_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name17'], 12);
          $this->arc_archivo_17_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type17'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_17             = sc_convert_encoding($this->arc_archivo_17,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_17_scfile_name = sc_convert_encoding($this->arc_archivo_17_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_17_ul_name     = sc_convert_encoding($this->arc_archivo_17_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name17) && '' != $this->arc_archivo__ul_name17)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name17]))
          {
              $this->arc_archivo__ul_name17 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name17];
          }
          $this->arc_archivo_17      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name17;
          $this->arc_archivo_17_scfile_name = substr($this->arc_archivo__ul_name17, 12);
          $this->arc_archivo_17_scfile_type = $this->arc_archivo__ul_type17;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_17             = sc_convert_encoding($this->arc_archivo_17,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_17_scfile_name = sc_convert_encoding($this->arc_archivo_17_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_17_ul_name     = sc_convert_encoding($this->arc_archivo_17_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_17))
      {
          $GLOBALS['arc_archivo_17']      = $this->arc_archivo_17;
          $GLOBALS['arc_archivo_17_scfile_name'] = $this->arc_archivo_17_scfile_name;
          $GLOBALS['arc_archivo_17_scfile_type'] = $this->arc_archivo_17_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name18']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name18'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name18]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name18'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name18];
          }
          $this->arc_archivo_18      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name18'];
          $this->arc_archivo_18_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name18'], 12);
          $this->arc_archivo_18_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type18'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_18             = sc_convert_encoding($this->arc_archivo_18,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_18_scfile_name = sc_convert_encoding($this->arc_archivo_18_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_18_ul_name     = sc_convert_encoding($this->arc_archivo_18_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name18) && '' != $this->arc_archivo__ul_name18)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name18]))
          {
              $this->arc_archivo__ul_name18 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name18];
          }
          $this->arc_archivo_18      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name18;
          $this->arc_archivo_18_scfile_name = substr($this->arc_archivo__ul_name18, 12);
          $this->arc_archivo_18_scfile_type = $this->arc_archivo__ul_type18;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_18             = sc_convert_encoding($this->arc_archivo_18,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_18_scfile_name = sc_convert_encoding($this->arc_archivo_18_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_18_ul_name     = sc_convert_encoding($this->arc_archivo_18_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_18))
      {
          $GLOBALS['arc_archivo_18']      = $this->arc_archivo_18;
          $GLOBALS['arc_archivo_18_scfile_name'] = $this->arc_archivo_18_scfile_name;
          $GLOBALS['arc_archivo_18_scfile_type'] = $this->arc_archivo_18_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name19']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name19'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name19]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name19'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name19];
          }
          $this->arc_archivo_19      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name19'];
          $this->arc_archivo_19_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name19'], 12);
          $this->arc_archivo_19_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type19'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_19             = sc_convert_encoding($this->arc_archivo_19,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_19_scfile_name = sc_convert_encoding($this->arc_archivo_19_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_19_ul_name     = sc_convert_encoding($this->arc_archivo_19_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name19) && '' != $this->arc_archivo__ul_name19)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name19]))
          {
              $this->arc_archivo__ul_name19 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name19];
          }
          $this->arc_archivo_19      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name19;
          $this->arc_archivo_19_scfile_name = substr($this->arc_archivo__ul_name19, 12);
          $this->arc_archivo_19_scfile_type = $this->arc_archivo__ul_type19;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_19             = sc_convert_encoding($this->arc_archivo_19,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_19_scfile_name = sc_convert_encoding($this->arc_archivo_19_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_19_ul_name     = sc_convert_encoding($this->arc_archivo_19_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_19))
      {
          $GLOBALS['arc_archivo_19']      = $this->arc_archivo_19;
          $GLOBALS['arc_archivo_19_scfile_name'] = $this->arc_archivo_19_scfile_name;
          $GLOBALS['arc_archivo_19_scfile_type'] = $this->arc_archivo_19_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name20']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name20'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name20]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name20'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name20];
          }
          $this->arc_archivo_20      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name20'];
          $this->arc_archivo_20_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name20'], 12);
          $this->arc_archivo_20_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type20'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_20             = sc_convert_encoding($this->arc_archivo_20,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_20_scfile_name = sc_convert_encoding($this->arc_archivo_20_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_20_ul_name     = sc_convert_encoding($this->arc_archivo_20_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name20) && '' != $this->arc_archivo__ul_name20)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name20]))
          {
              $this->arc_archivo__ul_name20 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name20];
          }
          $this->arc_archivo_20      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name20;
          $this->arc_archivo_20_scfile_name = substr($this->arc_archivo__ul_name20, 12);
          $this->arc_archivo_20_scfile_type = $this->arc_archivo__ul_type20;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_20             = sc_convert_encoding($this->arc_archivo_20,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_20_scfile_name = sc_convert_encoding($this->arc_archivo_20_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_20_ul_name     = sc_convert_encoding($this->arc_archivo_20_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_20))
      {
          $GLOBALS['arc_archivo_20']      = $this->arc_archivo_20;
          $GLOBALS['arc_archivo_20_scfile_name'] = $this->arc_archivo_20_scfile_name;
          $GLOBALS['arc_archivo_20_scfile_type'] = $this->arc_archivo_20_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name21']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name21'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name21]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name21'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name21];
          }
          $this->arc_archivo_21      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name21'];
          $this->arc_archivo_21_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name21'], 12);
          $this->arc_archivo_21_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type21'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_21             = sc_convert_encoding($this->arc_archivo_21,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_21_scfile_name = sc_convert_encoding($this->arc_archivo_21_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_21_ul_name     = sc_convert_encoding($this->arc_archivo_21_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name21) && '' != $this->arc_archivo__ul_name21)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name21]))
          {
              $this->arc_archivo__ul_name21 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name21];
          }
          $this->arc_archivo_21      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name21;
          $this->arc_archivo_21_scfile_name = substr($this->arc_archivo__ul_name21, 12);
          $this->arc_archivo_21_scfile_type = $this->arc_archivo__ul_type21;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_21             = sc_convert_encoding($this->arc_archivo_21,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_21_scfile_name = sc_convert_encoding($this->arc_archivo_21_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_21_ul_name     = sc_convert_encoding($this->arc_archivo_21_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_21))
      {
          $GLOBALS['arc_archivo_21']      = $this->arc_archivo_21;
          $GLOBALS['arc_archivo_21_scfile_name'] = $this->arc_archivo_21_scfile_name;
          $GLOBALS['arc_archivo_21_scfile_type'] = $this->arc_archivo_21_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name22']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name22'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name22]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name22'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name22];
          }
          $this->arc_archivo_22      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name22'];
          $this->arc_archivo_22_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name22'], 12);
          $this->arc_archivo_22_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type22'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_22             = sc_convert_encoding($this->arc_archivo_22,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_22_scfile_name = sc_convert_encoding($this->arc_archivo_22_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_22_ul_name     = sc_convert_encoding($this->arc_archivo_22_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name22) && '' != $this->arc_archivo__ul_name22)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name22]))
          {
              $this->arc_archivo__ul_name22 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name22];
          }
          $this->arc_archivo_22      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name22;
          $this->arc_archivo_22_scfile_name = substr($this->arc_archivo__ul_name22, 12);
          $this->arc_archivo_22_scfile_type = $this->arc_archivo__ul_type22;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_22             = sc_convert_encoding($this->arc_archivo_22,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_22_scfile_name = sc_convert_encoding($this->arc_archivo_22_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_22_ul_name     = sc_convert_encoding($this->arc_archivo_22_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_22))
      {
          $GLOBALS['arc_archivo_22']      = $this->arc_archivo_22;
          $GLOBALS['arc_archivo_22_scfile_name'] = $this->arc_archivo_22_scfile_name;
          $GLOBALS['arc_archivo_22_scfile_type'] = $this->arc_archivo_22_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name23']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name23'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name23]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name23'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name23];
          }
          $this->arc_archivo_23      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name23'];
          $this->arc_archivo_23_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name23'], 12);
          $this->arc_archivo_23_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type23'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_23             = sc_convert_encoding($this->arc_archivo_23,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_23_scfile_name = sc_convert_encoding($this->arc_archivo_23_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_23_ul_name     = sc_convert_encoding($this->arc_archivo_23_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name23) && '' != $this->arc_archivo__ul_name23)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name23]))
          {
              $this->arc_archivo__ul_name23 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name23];
          }
          $this->arc_archivo_23      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name23;
          $this->arc_archivo_23_scfile_name = substr($this->arc_archivo__ul_name23, 12);
          $this->arc_archivo_23_scfile_type = $this->arc_archivo__ul_type23;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_23             = sc_convert_encoding($this->arc_archivo_23,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_23_scfile_name = sc_convert_encoding($this->arc_archivo_23_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_23_ul_name     = sc_convert_encoding($this->arc_archivo_23_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_23))
      {
          $GLOBALS['arc_archivo_23']      = $this->arc_archivo_23;
          $GLOBALS['arc_archivo_23_scfile_name'] = $this->arc_archivo_23_scfile_name;
          $GLOBALS['arc_archivo_23_scfile_type'] = $this->arc_archivo_23_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name24']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name24'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name24]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name24'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name24];
          }
          $this->arc_archivo_24      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name24'];
          $this->arc_archivo_24_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name24'], 12);
          $this->arc_archivo_24_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type24'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_24             = sc_convert_encoding($this->arc_archivo_24,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_24_scfile_name = sc_convert_encoding($this->arc_archivo_24_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_24_ul_name     = sc_convert_encoding($this->arc_archivo_24_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name24) && '' != $this->arc_archivo__ul_name24)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name24]))
          {
              $this->arc_archivo__ul_name24 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name24];
          }
          $this->arc_archivo_24      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name24;
          $this->arc_archivo_24_scfile_name = substr($this->arc_archivo__ul_name24, 12);
          $this->arc_archivo_24_scfile_type = $this->arc_archivo__ul_type24;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_24             = sc_convert_encoding($this->arc_archivo_24,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_24_scfile_name = sc_convert_encoding($this->arc_archivo_24_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_24_ul_name     = sc_convert_encoding($this->arc_archivo_24_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_24))
      {
          $GLOBALS['arc_archivo_24']      = $this->arc_archivo_24;
          $GLOBALS['arc_archivo_24_scfile_name'] = $this->arc_archivo_24_scfile_name;
          $GLOBALS['arc_archivo_24_scfile_type'] = $this->arc_archivo_24_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name25']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name25'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name25]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name25'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name25];
          }
          $this->arc_archivo_25      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name25'];
          $this->arc_archivo_25_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name25'], 12);
          $this->arc_archivo_25_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type25'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_25             = sc_convert_encoding($this->arc_archivo_25,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_25_scfile_name = sc_convert_encoding($this->arc_archivo_25_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_25_ul_name     = sc_convert_encoding($this->arc_archivo_25_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name25) && '' != $this->arc_archivo__ul_name25)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name25]))
          {
              $this->arc_archivo__ul_name25 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name25];
          }
          $this->arc_archivo_25      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name25;
          $this->arc_archivo_25_scfile_name = substr($this->arc_archivo__ul_name25, 12);
          $this->arc_archivo_25_scfile_type = $this->arc_archivo__ul_type25;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_25             = sc_convert_encoding($this->arc_archivo_25,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_25_scfile_name = sc_convert_encoding($this->arc_archivo_25_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_25_ul_name     = sc_convert_encoding($this->arc_archivo_25_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_25))
      {
          $GLOBALS['arc_archivo_25']      = $this->arc_archivo_25;
          $GLOBALS['arc_archivo_25_scfile_name'] = $this->arc_archivo_25_scfile_name;
          $GLOBALS['arc_archivo_25_scfile_type'] = $this->arc_archivo_25_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name26']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name26'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name26]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name26'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name26];
          }
          $this->arc_archivo_26      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name26'];
          $this->arc_archivo_26_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name26'], 12);
          $this->arc_archivo_26_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type26'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_26             = sc_convert_encoding($this->arc_archivo_26,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_26_scfile_name = sc_convert_encoding($this->arc_archivo_26_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_26_ul_name     = sc_convert_encoding($this->arc_archivo_26_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name26) && '' != $this->arc_archivo__ul_name26)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name26]))
          {
              $this->arc_archivo__ul_name26 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name26];
          }
          $this->arc_archivo_26      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name26;
          $this->arc_archivo_26_scfile_name = substr($this->arc_archivo__ul_name26, 12);
          $this->arc_archivo_26_scfile_type = $this->arc_archivo__ul_type26;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_26             = sc_convert_encoding($this->arc_archivo_26,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_26_scfile_name = sc_convert_encoding($this->arc_archivo_26_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_26_ul_name     = sc_convert_encoding($this->arc_archivo_26_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_26))
      {
          $GLOBALS['arc_archivo_26']      = $this->arc_archivo_26;
          $GLOBALS['arc_archivo_26_scfile_name'] = $this->arc_archivo_26_scfile_name;
          $GLOBALS['arc_archivo_26_scfile_type'] = $this->arc_archivo_26_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name27']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name27'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name27]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name27'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name27];
          }
          $this->arc_archivo_27      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name27'];
          $this->arc_archivo_27_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name27'], 12);
          $this->arc_archivo_27_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type27'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_27             = sc_convert_encoding($this->arc_archivo_27,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_27_scfile_name = sc_convert_encoding($this->arc_archivo_27_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_27_ul_name     = sc_convert_encoding($this->arc_archivo_27_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name27) && '' != $this->arc_archivo__ul_name27)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name27]))
          {
              $this->arc_archivo__ul_name27 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name27];
          }
          $this->arc_archivo_27      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name27;
          $this->arc_archivo_27_scfile_name = substr($this->arc_archivo__ul_name27, 12);
          $this->arc_archivo_27_scfile_type = $this->arc_archivo__ul_type27;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_27             = sc_convert_encoding($this->arc_archivo_27,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_27_scfile_name = sc_convert_encoding($this->arc_archivo_27_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_27_ul_name     = sc_convert_encoding($this->arc_archivo_27_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_27))
      {
          $GLOBALS['arc_archivo_27']      = $this->arc_archivo_27;
          $GLOBALS['arc_archivo_27_scfile_name'] = $this->arc_archivo_27_scfile_name;
          $GLOBALS['arc_archivo_27_scfile_type'] = $this->arc_archivo_27_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name28']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name28'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name28]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name28'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name28];
          }
          $this->arc_archivo_28      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name28'];
          $this->arc_archivo_28_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name28'], 12);
          $this->arc_archivo_28_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type28'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_28             = sc_convert_encoding($this->arc_archivo_28,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_28_scfile_name = sc_convert_encoding($this->arc_archivo_28_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_28_ul_name     = sc_convert_encoding($this->arc_archivo_28_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name28) && '' != $this->arc_archivo__ul_name28)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name28]))
          {
              $this->arc_archivo__ul_name28 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name28];
          }
          $this->arc_archivo_28      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name28;
          $this->arc_archivo_28_scfile_name = substr($this->arc_archivo__ul_name28, 12);
          $this->arc_archivo_28_scfile_type = $this->arc_archivo__ul_type28;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_28             = sc_convert_encoding($this->arc_archivo_28,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_28_scfile_name = sc_convert_encoding($this->arc_archivo_28_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_28_ul_name     = sc_convert_encoding($this->arc_archivo_28_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_28))
      {
          $GLOBALS['arc_archivo_28']      = $this->arc_archivo_28;
          $GLOBALS['arc_archivo_28_scfile_name'] = $this->arc_archivo_28_scfile_name;
          $GLOBALS['arc_archivo_28_scfile_type'] = $this->arc_archivo_28_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name29']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name29'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name29]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name29'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name29];
          }
          $this->arc_archivo_29      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name29'];
          $this->arc_archivo_29_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name29'], 12);
          $this->arc_archivo_29_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type29'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_29             = sc_convert_encoding($this->arc_archivo_29,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_29_scfile_name = sc_convert_encoding($this->arc_archivo_29_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_29_ul_name     = sc_convert_encoding($this->arc_archivo_29_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name29) && '' != $this->arc_archivo__ul_name29)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name29]))
          {
              $this->arc_archivo__ul_name29 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name29];
          }
          $this->arc_archivo_29      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name29;
          $this->arc_archivo_29_scfile_name = substr($this->arc_archivo__ul_name29, 12);
          $this->arc_archivo_29_scfile_type = $this->arc_archivo__ul_type29;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_29             = sc_convert_encoding($this->arc_archivo_29,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_29_scfile_name = sc_convert_encoding($this->arc_archivo_29_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_29_ul_name     = sc_convert_encoding($this->arc_archivo_29_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_29))
      {
          $GLOBALS['arc_archivo_29']      = $this->arc_archivo_29;
          $GLOBALS['arc_archivo_29_scfile_name'] = $this->arc_archivo_29_scfile_name;
          $GLOBALS['arc_archivo_29_scfile_type'] = $this->arc_archivo_29_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name30']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name30'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name30]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name30'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name30];
          }
          $this->arc_archivo_30      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name30'];
          $this->arc_archivo_30_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name30'], 12);
          $this->arc_archivo_30_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type30'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_30             = sc_convert_encoding($this->arc_archivo_30,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_30_scfile_name = sc_convert_encoding($this->arc_archivo_30_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_30_ul_name     = sc_convert_encoding($this->arc_archivo_30_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name30) && '' != $this->arc_archivo__ul_name30)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name30]))
          {
              $this->arc_archivo__ul_name30 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name30];
          }
          $this->arc_archivo_30      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name30;
          $this->arc_archivo_30_scfile_name = substr($this->arc_archivo__ul_name30, 12);
          $this->arc_archivo_30_scfile_type = $this->arc_archivo__ul_type30;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_30             = sc_convert_encoding($this->arc_archivo_30,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_30_scfile_name = sc_convert_encoding($this->arc_archivo_30_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_30_ul_name     = sc_convert_encoding($this->arc_archivo_30_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_30))
      {
          $GLOBALS['arc_archivo_30']      = $this->arc_archivo_30;
          $GLOBALS['arc_archivo_30_scfile_name'] = $this->arc_archivo_30_scfile_name;
          $GLOBALS['arc_archivo_30_scfile_type'] = $this->arc_archivo_30_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name31']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name31'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name31]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name31'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name31];
          }
          $this->arc_archivo_31      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name31'];
          $this->arc_archivo_31_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name31'], 12);
          $this->arc_archivo_31_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type31'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_31             = sc_convert_encoding($this->arc_archivo_31,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_31_scfile_name = sc_convert_encoding($this->arc_archivo_31_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_31_ul_name     = sc_convert_encoding($this->arc_archivo_31_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name31) && '' != $this->arc_archivo__ul_name31)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name31]))
          {
              $this->arc_archivo__ul_name31 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name31];
          }
          $this->arc_archivo_31      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name31;
          $this->arc_archivo_31_scfile_name = substr($this->arc_archivo__ul_name31, 12);
          $this->arc_archivo_31_scfile_type = $this->arc_archivo__ul_type31;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_31             = sc_convert_encoding($this->arc_archivo_31,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_31_scfile_name = sc_convert_encoding($this->arc_archivo_31_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_31_ul_name     = sc_convert_encoding($this->arc_archivo_31_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_31))
      {
          $GLOBALS['arc_archivo_31']      = $this->arc_archivo_31;
          $GLOBALS['arc_archivo_31_scfile_name'] = $this->arc_archivo_31_scfile_name;
          $GLOBALS['arc_archivo_31_scfile_type'] = $this->arc_archivo_31_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name32']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name32'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name32]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name32'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name32];
          }
          $this->arc_archivo_32      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name32'];
          $this->arc_archivo_32_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name32'], 12);
          $this->arc_archivo_32_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type32'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_32             = sc_convert_encoding($this->arc_archivo_32,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_32_scfile_name = sc_convert_encoding($this->arc_archivo_32_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_32_ul_name     = sc_convert_encoding($this->arc_archivo_32_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name32) && '' != $this->arc_archivo__ul_name32)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name32]))
          {
              $this->arc_archivo__ul_name32 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name32];
          }
          $this->arc_archivo_32      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name32;
          $this->arc_archivo_32_scfile_name = substr($this->arc_archivo__ul_name32, 12);
          $this->arc_archivo_32_scfile_type = $this->arc_archivo__ul_type32;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_32             = sc_convert_encoding($this->arc_archivo_32,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_32_scfile_name = sc_convert_encoding($this->arc_archivo_32_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_32_ul_name     = sc_convert_encoding($this->arc_archivo_32_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_32))
      {
          $GLOBALS['arc_archivo_32']      = $this->arc_archivo_32;
          $GLOBALS['arc_archivo_32_scfile_name'] = $this->arc_archivo_32_scfile_name;
          $GLOBALS['arc_archivo_32_scfile_type'] = $this->arc_archivo_32_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name33']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name33'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name33]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name33'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name33];
          }
          $this->arc_archivo_33      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name33'];
          $this->arc_archivo_33_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name33'], 12);
          $this->arc_archivo_33_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type33'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_33             = sc_convert_encoding($this->arc_archivo_33,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_33_scfile_name = sc_convert_encoding($this->arc_archivo_33_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_33_ul_name     = sc_convert_encoding($this->arc_archivo_33_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name33) && '' != $this->arc_archivo__ul_name33)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name33]))
          {
              $this->arc_archivo__ul_name33 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name33];
          }
          $this->arc_archivo_33      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name33;
          $this->arc_archivo_33_scfile_name = substr($this->arc_archivo__ul_name33, 12);
          $this->arc_archivo_33_scfile_type = $this->arc_archivo__ul_type33;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_33             = sc_convert_encoding($this->arc_archivo_33,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_33_scfile_name = sc_convert_encoding($this->arc_archivo_33_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_33_ul_name     = sc_convert_encoding($this->arc_archivo_33_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_33))
      {
          $GLOBALS['arc_archivo_33']      = $this->arc_archivo_33;
          $GLOBALS['arc_archivo_33_scfile_name'] = $this->arc_archivo_33_scfile_name;
          $GLOBALS['arc_archivo_33_scfile_type'] = $this->arc_archivo_33_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name34']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name34'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name34]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name34'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name34];
          }
          $this->arc_archivo_34      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name34'];
          $this->arc_archivo_34_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name34'], 12);
          $this->arc_archivo_34_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type34'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_34             = sc_convert_encoding($this->arc_archivo_34,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_34_scfile_name = sc_convert_encoding($this->arc_archivo_34_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_34_ul_name     = sc_convert_encoding($this->arc_archivo_34_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name34) && '' != $this->arc_archivo__ul_name34)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name34]))
          {
              $this->arc_archivo__ul_name34 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name34];
          }
          $this->arc_archivo_34      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name34;
          $this->arc_archivo_34_scfile_name = substr($this->arc_archivo__ul_name34, 12);
          $this->arc_archivo_34_scfile_type = $this->arc_archivo__ul_type34;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_34             = sc_convert_encoding($this->arc_archivo_34,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_34_scfile_name = sc_convert_encoding($this->arc_archivo_34_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_34_ul_name     = sc_convert_encoding($this->arc_archivo_34_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_34))
      {
          $GLOBALS['arc_archivo_34']      = $this->arc_archivo_34;
          $GLOBALS['arc_archivo_34_scfile_name'] = $this->arc_archivo_34_scfile_name;
          $GLOBALS['arc_archivo_34_scfile_type'] = $this->arc_archivo_34_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name35']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name35'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name35]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name35'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name35];
          }
          $this->arc_archivo_35      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name35'];
          $this->arc_archivo_35_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name35'], 12);
          $this->arc_archivo_35_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type35'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_35             = sc_convert_encoding($this->arc_archivo_35,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_35_scfile_name = sc_convert_encoding($this->arc_archivo_35_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_35_ul_name     = sc_convert_encoding($this->arc_archivo_35_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name35) && '' != $this->arc_archivo__ul_name35)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name35]))
          {
              $this->arc_archivo__ul_name35 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name35];
          }
          $this->arc_archivo_35      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name35;
          $this->arc_archivo_35_scfile_name = substr($this->arc_archivo__ul_name35, 12);
          $this->arc_archivo_35_scfile_type = $this->arc_archivo__ul_type35;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_35             = sc_convert_encoding($this->arc_archivo_35,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_35_scfile_name = sc_convert_encoding($this->arc_archivo_35_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_35_ul_name     = sc_convert_encoding($this->arc_archivo_35_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_35))
      {
          $GLOBALS['arc_archivo_35']      = $this->arc_archivo_35;
          $GLOBALS['arc_archivo_35_scfile_name'] = $this->arc_archivo_35_scfile_name;
          $GLOBALS['arc_archivo_35_scfile_type'] = $this->arc_archivo_35_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name36']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name36'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name36]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name36'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name36];
          }
          $this->arc_archivo_36      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name36'];
          $this->arc_archivo_36_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name36'], 12);
          $this->arc_archivo_36_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type36'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_36             = sc_convert_encoding($this->arc_archivo_36,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_36_scfile_name = sc_convert_encoding($this->arc_archivo_36_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_36_ul_name     = sc_convert_encoding($this->arc_archivo_36_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name36) && '' != $this->arc_archivo__ul_name36)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name36]))
          {
              $this->arc_archivo__ul_name36 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name36];
          }
          $this->arc_archivo_36      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name36;
          $this->arc_archivo_36_scfile_name = substr($this->arc_archivo__ul_name36, 12);
          $this->arc_archivo_36_scfile_type = $this->arc_archivo__ul_type36;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_36             = sc_convert_encoding($this->arc_archivo_36,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_36_scfile_name = sc_convert_encoding($this->arc_archivo_36_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_36_ul_name     = sc_convert_encoding($this->arc_archivo_36_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_36))
      {
          $GLOBALS['arc_archivo_36']      = $this->arc_archivo_36;
          $GLOBALS['arc_archivo_36_scfile_name'] = $this->arc_archivo_36_scfile_name;
          $GLOBALS['arc_archivo_36_scfile_type'] = $this->arc_archivo_36_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name37']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name37'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name37]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name37'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name37];
          }
          $this->arc_archivo_37      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name37'];
          $this->arc_archivo_37_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name37'], 12);
          $this->arc_archivo_37_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type37'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_37             = sc_convert_encoding($this->arc_archivo_37,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_37_scfile_name = sc_convert_encoding($this->arc_archivo_37_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_37_ul_name     = sc_convert_encoding($this->arc_archivo_37_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name37) && '' != $this->arc_archivo__ul_name37)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name37]))
          {
              $this->arc_archivo__ul_name37 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name37];
          }
          $this->arc_archivo_37      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name37;
          $this->arc_archivo_37_scfile_name = substr($this->arc_archivo__ul_name37, 12);
          $this->arc_archivo_37_scfile_type = $this->arc_archivo__ul_type37;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_37             = sc_convert_encoding($this->arc_archivo_37,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_37_scfile_name = sc_convert_encoding($this->arc_archivo_37_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_37_ul_name     = sc_convert_encoding($this->arc_archivo_37_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_37))
      {
          $GLOBALS['arc_archivo_37']      = $this->arc_archivo_37;
          $GLOBALS['arc_archivo_37_scfile_name'] = $this->arc_archivo_37_scfile_name;
          $GLOBALS['arc_archivo_37_scfile_type'] = $this->arc_archivo_37_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name38']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name38'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name38]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name38'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name38];
          }
          $this->arc_archivo_38      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name38'];
          $this->arc_archivo_38_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name38'], 12);
          $this->arc_archivo_38_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type38'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_38             = sc_convert_encoding($this->arc_archivo_38,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_38_scfile_name = sc_convert_encoding($this->arc_archivo_38_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_38_ul_name     = sc_convert_encoding($this->arc_archivo_38_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name38) && '' != $this->arc_archivo__ul_name38)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name38]))
          {
              $this->arc_archivo__ul_name38 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name38];
          }
          $this->arc_archivo_38      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name38;
          $this->arc_archivo_38_scfile_name = substr($this->arc_archivo__ul_name38, 12);
          $this->arc_archivo_38_scfile_type = $this->arc_archivo__ul_type38;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_38             = sc_convert_encoding($this->arc_archivo_38,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_38_scfile_name = sc_convert_encoding($this->arc_archivo_38_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_38_ul_name     = sc_convert_encoding($this->arc_archivo_38_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_38))
      {
          $GLOBALS['arc_archivo_38']      = $this->arc_archivo_38;
          $GLOBALS['arc_archivo_38_scfile_name'] = $this->arc_archivo_38_scfile_name;
          $GLOBALS['arc_archivo_38_scfile_type'] = $this->arc_archivo_38_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name39']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name39'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name39]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name39'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name39];
          }
          $this->arc_archivo_39      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name39'];
          $this->arc_archivo_39_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name39'], 12);
          $this->arc_archivo_39_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type39'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_39             = sc_convert_encoding($this->arc_archivo_39,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_39_scfile_name = sc_convert_encoding($this->arc_archivo_39_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_39_ul_name     = sc_convert_encoding($this->arc_archivo_39_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name39) && '' != $this->arc_archivo__ul_name39)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name39]))
          {
              $this->arc_archivo__ul_name39 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name39];
          }
          $this->arc_archivo_39      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name39;
          $this->arc_archivo_39_scfile_name = substr($this->arc_archivo__ul_name39, 12);
          $this->arc_archivo_39_scfile_type = $this->arc_archivo__ul_type39;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_39             = sc_convert_encoding($this->arc_archivo_39,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_39_scfile_name = sc_convert_encoding($this->arc_archivo_39_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_39_ul_name     = sc_convert_encoding($this->arc_archivo_39_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_39))
      {
          $GLOBALS['arc_archivo_39']      = $this->arc_archivo_39;
          $GLOBALS['arc_archivo_39_scfile_name'] = $this->arc_archivo_39_scfile_name;
          $GLOBALS['arc_archivo_39_scfile_type'] = $this->arc_archivo_39_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name40']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name40'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name40]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name40'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name40];
          }
          $this->arc_archivo_40      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name40'];
          $this->arc_archivo_40_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name40'], 12);
          $this->arc_archivo_40_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type40'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_40             = sc_convert_encoding($this->arc_archivo_40,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_40_scfile_name = sc_convert_encoding($this->arc_archivo_40_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_40_ul_name     = sc_convert_encoding($this->arc_archivo_40_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name40) && '' != $this->arc_archivo__ul_name40)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name40]))
          {
              $this->arc_archivo__ul_name40 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name40];
          }
          $this->arc_archivo_40      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name40;
          $this->arc_archivo_40_scfile_name = substr($this->arc_archivo__ul_name40, 12);
          $this->arc_archivo_40_scfile_type = $this->arc_archivo__ul_type40;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_40             = sc_convert_encoding($this->arc_archivo_40,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_40_scfile_name = sc_convert_encoding($this->arc_archivo_40_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_40_ul_name     = sc_convert_encoding($this->arc_archivo_40_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_40))
      {
          $GLOBALS['arc_archivo_40']      = $this->arc_archivo_40;
          $GLOBALS['arc_archivo_40_scfile_name'] = $this->arc_archivo_40_scfile_name;
          $GLOBALS['arc_archivo_40_scfile_type'] = $this->arc_archivo_40_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name41']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name41'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name41]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name41'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name41];
          }
          $this->arc_archivo_41      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name41'];
          $this->arc_archivo_41_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name41'], 12);
          $this->arc_archivo_41_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type41'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_41             = sc_convert_encoding($this->arc_archivo_41,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_41_scfile_name = sc_convert_encoding($this->arc_archivo_41_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_41_ul_name     = sc_convert_encoding($this->arc_archivo_41_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name41) && '' != $this->arc_archivo__ul_name41)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name41]))
          {
              $this->arc_archivo__ul_name41 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name41];
          }
          $this->arc_archivo_41      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name41;
          $this->arc_archivo_41_scfile_name = substr($this->arc_archivo__ul_name41, 12);
          $this->arc_archivo_41_scfile_type = $this->arc_archivo__ul_type41;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_41             = sc_convert_encoding($this->arc_archivo_41,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_41_scfile_name = sc_convert_encoding($this->arc_archivo_41_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_41_ul_name     = sc_convert_encoding($this->arc_archivo_41_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_41))
      {
          $GLOBALS['arc_archivo_41']      = $this->arc_archivo_41;
          $GLOBALS['arc_archivo_41_scfile_name'] = $this->arc_archivo_41_scfile_name;
          $GLOBALS['arc_archivo_41_scfile_type'] = $this->arc_archivo_41_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name42']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name42'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name42]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name42'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name42];
          }
          $this->arc_archivo_42      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name42'];
          $this->arc_archivo_42_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name42'], 12);
          $this->arc_archivo_42_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type42'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_42             = sc_convert_encoding($this->arc_archivo_42,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_42_scfile_name = sc_convert_encoding($this->arc_archivo_42_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_42_ul_name     = sc_convert_encoding($this->arc_archivo_42_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name42) && '' != $this->arc_archivo__ul_name42)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name42]))
          {
              $this->arc_archivo__ul_name42 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name42];
          }
          $this->arc_archivo_42      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name42;
          $this->arc_archivo_42_scfile_name = substr($this->arc_archivo__ul_name42, 12);
          $this->arc_archivo_42_scfile_type = $this->arc_archivo__ul_type42;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_42             = sc_convert_encoding($this->arc_archivo_42,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_42_scfile_name = sc_convert_encoding($this->arc_archivo_42_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_42_ul_name     = sc_convert_encoding($this->arc_archivo_42_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_42))
      {
          $GLOBALS['arc_archivo_42']      = $this->arc_archivo_42;
          $GLOBALS['arc_archivo_42_scfile_name'] = $this->arc_archivo_42_scfile_name;
          $GLOBALS['arc_archivo_42_scfile_type'] = $this->arc_archivo_42_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name43']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name43'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name43]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name43'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name43];
          }
          $this->arc_archivo_43      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name43'];
          $this->arc_archivo_43_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name43'], 12);
          $this->arc_archivo_43_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type43'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_43             = sc_convert_encoding($this->arc_archivo_43,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_43_scfile_name = sc_convert_encoding($this->arc_archivo_43_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_43_ul_name     = sc_convert_encoding($this->arc_archivo_43_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name43) && '' != $this->arc_archivo__ul_name43)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name43]))
          {
              $this->arc_archivo__ul_name43 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name43];
          }
          $this->arc_archivo_43      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name43;
          $this->arc_archivo_43_scfile_name = substr($this->arc_archivo__ul_name43, 12);
          $this->arc_archivo_43_scfile_type = $this->arc_archivo__ul_type43;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_43             = sc_convert_encoding($this->arc_archivo_43,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_43_scfile_name = sc_convert_encoding($this->arc_archivo_43_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_43_ul_name     = sc_convert_encoding($this->arc_archivo_43_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_43))
      {
          $GLOBALS['arc_archivo_43']      = $this->arc_archivo_43;
          $GLOBALS['arc_archivo_43_scfile_name'] = $this->arc_archivo_43_scfile_name;
          $GLOBALS['arc_archivo_43_scfile_type'] = $this->arc_archivo_43_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name44']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name44'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name44]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name44'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name44];
          }
          $this->arc_archivo_44      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name44'];
          $this->arc_archivo_44_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name44'], 12);
          $this->arc_archivo_44_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type44'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_44             = sc_convert_encoding($this->arc_archivo_44,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_44_scfile_name = sc_convert_encoding($this->arc_archivo_44_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_44_ul_name     = sc_convert_encoding($this->arc_archivo_44_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name44) && '' != $this->arc_archivo__ul_name44)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name44]))
          {
              $this->arc_archivo__ul_name44 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name44];
          }
          $this->arc_archivo_44      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name44;
          $this->arc_archivo_44_scfile_name = substr($this->arc_archivo__ul_name44, 12);
          $this->arc_archivo_44_scfile_type = $this->arc_archivo__ul_type44;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_44             = sc_convert_encoding($this->arc_archivo_44,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_44_scfile_name = sc_convert_encoding($this->arc_archivo_44_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_44_ul_name     = sc_convert_encoding($this->arc_archivo_44_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_44))
      {
          $GLOBALS['arc_archivo_44']      = $this->arc_archivo_44;
          $GLOBALS['arc_archivo_44_scfile_name'] = $this->arc_archivo_44_scfile_name;
          $GLOBALS['arc_archivo_44_scfile_type'] = $this->arc_archivo_44_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name45']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name45'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name45]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name45'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name45];
          }
          $this->arc_archivo_45      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name45'];
          $this->arc_archivo_45_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name45'], 12);
          $this->arc_archivo_45_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type45'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_45             = sc_convert_encoding($this->arc_archivo_45,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_45_scfile_name = sc_convert_encoding($this->arc_archivo_45_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_45_ul_name     = sc_convert_encoding($this->arc_archivo_45_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name45) && '' != $this->arc_archivo__ul_name45)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name45]))
          {
              $this->arc_archivo__ul_name45 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name45];
          }
          $this->arc_archivo_45      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name45;
          $this->arc_archivo_45_scfile_name = substr($this->arc_archivo__ul_name45, 12);
          $this->arc_archivo_45_scfile_type = $this->arc_archivo__ul_type45;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_45             = sc_convert_encoding($this->arc_archivo_45,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_45_scfile_name = sc_convert_encoding($this->arc_archivo_45_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_45_ul_name     = sc_convert_encoding($this->arc_archivo_45_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_45))
      {
          $GLOBALS['arc_archivo_45']      = $this->arc_archivo_45;
          $GLOBALS['arc_archivo_45_scfile_name'] = $this->arc_archivo_45_scfile_name;
          $GLOBALS['arc_archivo_45_scfile_type'] = $this->arc_archivo_45_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name46']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name46'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name46]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name46'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name46];
          }
          $this->arc_archivo_46      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name46'];
          $this->arc_archivo_46_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name46'], 12);
          $this->arc_archivo_46_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type46'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_46             = sc_convert_encoding($this->arc_archivo_46,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_46_scfile_name = sc_convert_encoding($this->arc_archivo_46_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_46_ul_name     = sc_convert_encoding($this->arc_archivo_46_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name46) && '' != $this->arc_archivo__ul_name46)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name46]))
          {
              $this->arc_archivo__ul_name46 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name46];
          }
          $this->arc_archivo_46      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name46;
          $this->arc_archivo_46_scfile_name = substr($this->arc_archivo__ul_name46, 12);
          $this->arc_archivo_46_scfile_type = $this->arc_archivo__ul_type46;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_46             = sc_convert_encoding($this->arc_archivo_46,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_46_scfile_name = sc_convert_encoding($this->arc_archivo_46_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_46_ul_name     = sc_convert_encoding($this->arc_archivo_46_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_46))
      {
          $GLOBALS['arc_archivo_46']      = $this->arc_archivo_46;
          $GLOBALS['arc_archivo_46_scfile_name'] = $this->arc_archivo_46_scfile_name;
          $GLOBALS['arc_archivo_46_scfile_type'] = $this->arc_archivo_46_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name47']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name47'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name47]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name47'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name47];
          }
          $this->arc_archivo_47      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name47'];
          $this->arc_archivo_47_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name47'], 12);
          $this->arc_archivo_47_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type47'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_47             = sc_convert_encoding($this->arc_archivo_47,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_47_scfile_name = sc_convert_encoding($this->arc_archivo_47_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_47_ul_name     = sc_convert_encoding($this->arc_archivo_47_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name47) && '' != $this->arc_archivo__ul_name47)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name47]))
          {
              $this->arc_archivo__ul_name47 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name47];
          }
          $this->arc_archivo_47      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name47;
          $this->arc_archivo_47_scfile_name = substr($this->arc_archivo__ul_name47, 12);
          $this->arc_archivo_47_scfile_type = $this->arc_archivo__ul_type47;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_47             = sc_convert_encoding($this->arc_archivo_47,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_47_scfile_name = sc_convert_encoding($this->arc_archivo_47_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_47_ul_name     = sc_convert_encoding($this->arc_archivo_47_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_47))
      {
          $GLOBALS['arc_archivo_47']      = $this->arc_archivo_47;
          $GLOBALS['arc_archivo_47_scfile_name'] = $this->arc_archivo_47_scfile_name;
          $GLOBALS['arc_archivo_47_scfile_type'] = $this->arc_archivo_47_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name48']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name48'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name48]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name48'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name48];
          }
          $this->arc_archivo_48      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name48'];
          $this->arc_archivo_48_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name48'], 12);
          $this->arc_archivo_48_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type48'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_48             = sc_convert_encoding($this->arc_archivo_48,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_48_scfile_name = sc_convert_encoding($this->arc_archivo_48_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_48_ul_name     = sc_convert_encoding($this->arc_archivo_48_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name48) && '' != $this->arc_archivo__ul_name48)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name48]))
          {
              $this->arc_archivo__ul_name48 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name48];
          }
          $this->arc_archivo_48      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name48;
          $this->arc_archivo_48_scfile_name = substr($this->arc_archivo__ul_name48, 12);
          $this->arc_archivo_48_scfile_type = $this->arc_archivo__ul_type48;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_48             = sc_convert_encoding($this->arc_archivo_48,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_48_scfile_name = sc_convert_encoding($this->arc_archivo_48_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_48_ul_name     = sc_convert_encoding($this->arc_archivo_48_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_48))
      {
          $GLOBALS['arc_archivo_48']      = $this->arc_archivo_48;
          $GLOBALS['arc_archivo_48_scfile_name'] = $this->arc_archivo_48_scfile_name;
          $GLOBALS['arc_archivo_48_scfile_type'] = $this->arc_archivo_48_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name49']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name49'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name49]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name49'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name49];
          }
          $this->arc_archivo_49      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name49'];
          $this->arc_archivo_49_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name49'], 12);
          $this->arc_archivo_49_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type49'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_49             = sc_convert_encoding($this->arc_archivo_49,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_49_scfile_name = sc_convert_encoding($this->arc_archivo_49_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_49_ul_name     = sc_convert_encoding($this->arc_archivo_49_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name49) && '' != $this->arc_archivo__ul_name49)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name49]))
          {
              $this->arc_archivo__ul_name49 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name49];
          }
          $this->arc_archivo_49      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name49;
          $this->arc_archivo_49_scfile_name = substr($this->arc_archivo__ul_name49, 12);
          $this->arc_archivo_49_scfile_type = $this->arc_archivo__ul_type49;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_49             = sc_convert_encoding($this->arc_archivo_49,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_49_scfile_name = sc_convert_encoding($this->arc_archivo_49_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_49_ul_name     = sc_convert_encoding($this->arc_archivo_49_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_49))
      {
          $GLOBALS['arc_archivo_49']      = $this->arc_archivo_49;
          $GLOBALS['arc_archivo_49_scfile_name'] = $this->arc_archivo_49_scfile_name;
          $GLOBALS['arc_archivo_49_scfile_type'] = $this->arc_archivo_49_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name50']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name50'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name50]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name50'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name50];
          }
          $this->arc_archivo_50      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name50'];
          $this->arc_archivo_50_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name50'], 12);
          $this->arc_archivo_50_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type50'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_50             = sc_convert_encoding($this->arc_archivo_50,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_50_scfile_name = sc_convert_encoding($this->arc_archivo_50_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_50_ul_name     = sc_convert_encoding($this->arc_archivo_50_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name50) && '' != $this->arc_archivo__ul_name50)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name50]))
          {
              $this->arc_archivo__ul_name50 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name50];
          }
          $this->arc_archivo_50      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name50;
          $this->arc_archivo_50_scfile_name = substr($this->arc_archivo__ul_name50, 12);
          $this->arc_archivo_50_scfile_type = $this->arc_archivo__ul_type50;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_50             = sc_convert_encoding($this->arc_archivo_50,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_50_scfile_name = sc_convert_encoding($this->arc_archivo_50_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_50_ul_name     = sc_convert_encoding($this->arc_archivo_50_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_50))
      {
          $GLOBALS['arc_archivo_50']      = $this->arc_archivo_50;
          $GLOBALS['arc_archivo_50_scfile_name'] = $this->arc_archivo_50_scfile_name;
          $GLOBALS['arc_archivo_50_scfile_type'] = $this->arc_archivo_50_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name51']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name51'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name51]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name51'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name51];
          }
          $this->arc_archivo_51      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name51'];
          $this->arc_archivo_51_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name51'], 12);
          $this->arc_archivo_51_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type51'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_51             = sc_convert_encoding($this->arc_archivo_51,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_51_scfile_name = sc_convert_encoding($this->arc_archivo_51_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_51_ul_name     = sc_convert_encoding($this->arc_archivo_51_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name51) && '' != $this->arc_archivo__ul_name51)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name51]))
          {
              $this->arc_archivo__ul_name51 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name51];
          }
          $this->arc_archivo_51      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name51;
          $this->arc_archivo_51_scfile_name = substr($this->arc_archivo__ul_name51, 12);
          $this->arc_archivo_51_scfile_type = $this->arc_archivo__ul_type51;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_51             = sc_convert_encoding($this->arc_archivo_51,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_51_scfile_name = sc_convert_encoding($this->arc_archivo_51_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_51_ul_name     = sc_convert_encoding($this->arc_archivo_51_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_51))
      {
          $GLOBALS['arc_archivo_51']      = $this->arc_archivo_51;
          $GLOBALS['arc_archivo_51_scfile_name'] = $this->arc_archivo_51_scfile_name;
          $GLOBALS['arc_archivo_51_scfile_type'] = $this->arc_archivo_51_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name52']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name52'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name52]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name52'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name52];
          }
          $this->arc_archivo_52      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name52'];
          $this->arc_archivo_52_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name52'], 12);
          $this->arc_archivo_52_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type52'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_52             = sc_convert_encoding($this->arc_archivo_52,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_52_scfile_name = sc_convert_encoding($this->arc_archivo_52_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_52_ul_name     = sc_convert_encoding($this->arc_archivo_52_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name52) && '' != $this->arc_archivo__ul_name52)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name52]))
          {
              $this->arc_archivo__ul_name52 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name52];
          }
          $this->arc_archivo_52      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name52;
          $this->arc_archivo_52_scfile_name = substr($this->arc_archivo__ul_name52, 12);
          $this->arc_archivo_52_scfile_type = $this->arc_archivo__ul_type52;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_52             = sc_convert_encoding($this->arc_archivo_52,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_52_scfile_name = sc_convert_encoding($this->arc_archivo_52_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_52_ul_name     = sc_convert_encoding($this->arc_archivo_52_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_52))
      {
          $GLOBALS['arc_archivo_52']      = $this->arc_archivo_52;
          $GLOBALS['arc_archivo_52_scfile_name'] = $this->arc_archivo_52_scfile_name;
          $GLOBALS['arc_archivo_52_scfile_type'] = $this->arc_archivo_52_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name53']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name53'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name53]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name53'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name53];
          }
          $this->arc_archivo_53      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name53'];
          $this->arc_archivo_53_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name53'], 12);
          $this->arc_archivo_53_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type53'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_53             = sc_convert_encoding($this->arc_archivo_53,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_53_scfile_name = sc_convert_encoding($this->arc_archivo_53_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_53_ul_name     = sc_convert_encoding($this->arc_archivo_53_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name53) && '' != $this->arc_archivo__ul_name53)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name53]))
          {
              $this->arc_archivo__ul_name53 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name53];
          }
          $this->arc_archivo_53      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name53;
          $this->arc_archivo_53_scfile_name = substr($this->arc_archivo__ul_name53, 12);
          $this->arc_archivo_53_scfile_type = $this->arc_archivo__ul_type53;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_53             = sc_convert_encoding($this->arc_archivo_53,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_53_scfile_name = sc_convert_encoding($this->arc_archivo_53_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_53_ul_name     = sc_convert_encoding($this->arc_archivo_53_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_53))
      {
          $GLOBALS['arc_archivo_53']      = $this->arc_archivo_53;
          $GLOBALS['arc_archivo_53_scfile_name'] = $this->arc_archivo_53_scfile_name;
          $GLOBALS['arc_archivo_53_scfile_type'] = $this->arc_archivo_53_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name54']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name54'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name54]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name54'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name54];
          }
          $this->arc_archivo_54      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name54'];
          $this->arc_archivo_54_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name54'], 12);
          $this->arc_archivo_54_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type54'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_54             = sc_convert_encoding($this->arc_archivo_54,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_54_scfile_name = sc_convert_encoding($this->arc_archivo_54_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_54_ul_name     = sc_convert_encoding($this->arc_archivo_54_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name54) && '' != $this->arc_archivo__ul_name54)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name54]))
          {
              $this->arc_archivo__ul_name54 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name54];
          }
          $this->arc_archivo_54      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name54;
          $this->arc_archivo_54_scfile_name = substr($this->arc_archivo__ul_name54, 12);
          $this->arc_archivo_54_scfile_type = $this->arc_archivo__ul_type54;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_54             = sc_convert_encoding($this->arc_archivo_54,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_54_scfile_name = sc_convert_encoding($this->arc_archivo_54_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_54_ul_name     = sc_convert_encoding($this->arc_archivo_54_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_54))
      {
          $GLOBALS['arc_archivo_54']      = $this->arc_archivo_54;
          $GLOBALS['arc_archivo_54_scfile_name'] = $this->arc_archivo_54_scfile_name;
          $GLOBALS['arc_archivo_54_scfile_type'] = $this->arc_archivo_54_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name55']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name55'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name55]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name55'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name55];
          }
          $this->arc_archivo_55      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name55'];
          $this->arc_archivo_55_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name55'], 12);
          $this->arc_archivo_55_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type55'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_55             = sc_convert_encoding($this->arc_archivo_55,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_55_scfile_name = sc_convert_encoding($this->arc_archivo_55_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_55_ul_name     = sc_convert_encoding($this->arc_archivo_55_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name55) && '' != $this->arc_archivo__ul_name55)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name55]))
          {
              $this->arc_archivo__ul_name55 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name55];
          }
          $this->arc_archivo_55      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name55;
          $this->arc_archivo_55_scfile_name = substr($this->arc_archivo__ul_name55, 12);
          $this->arc_archivo_55_scfile_type = $this->arc_archivo__ul_type55;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_55             = sc_convert_encoding($this->arc_archivo_55,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_55_scfile_name = sc_convert_encoding($this->arc_archivo_55_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_55_ul_name     = sc_convert_encoding($this->arc_archivo_55_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_55))
      {
          $GLOBALS['arc_archivo_55']      = $this->arc_archivo_55;
          $GLOBALS['arc_archivo_55_scfile_name'] = $this->arc_archivo_55_scfile_name;
          $GLOBALS['arc_archivo_55_scfile_type'] = $this->arc_archivo_55_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name56']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name56'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name56]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name56'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name56];
          }
          $this->arc_archivo_56      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name56'];
          $this->arc_archivo_56_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name56'], 12);
          $this->arc_archivo_56_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type56'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_56             = sc_convert_encoding($this->arc_archivo_56,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_56_scfile_name = sc_convert_encoding($this->arc_archivo_56_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_56_ul_name     = sc_convert_encoding($this->arc_archivo_56_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name56) && '' != $this->arc_archivo__ul_name56)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name56]))
          {
              $this->arc_archivo__ul_name56 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name56];
          }
          $this->arc_archivo_56      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name56;
          $this->arc_archivo_56_scfile_name = substr($this->arc_archivo__ul_name56, 12);
          $this->arc_archivo_56_scfile_type = $this->arc_archivo__ul_type56;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_56             = sc_convert_encoding($this->arc_archivo_56,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_56_scfile_name = sc_convert_encoding($this->arc_archivo_56_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_56_ul_name     = sc_convert_encoding($this->arc_archivo_56_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_56))
      {
          $GLOBALS['arc_archivo_56']      = $this->arc_archivo_56;
          $GLOBALS['arc_archivo_56_scfile_name'] = $this->arc_archivo_56_scfile_name;
          $GLOBALS['arc_archivo_56_scfile_type'] = $this->arc_archivo_56_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name57']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name57'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name57]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name57'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name57];
          }
          $this->arc_archivo_57      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name57'];
          $this->arc_archivo_57_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name57'], 12);
          $this->arc_archivo_57_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type57'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_57             = sc_convert_encoding($this->arc_archivo_57,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_57_scfile_name = sc_convert_encoding($this->arc_archivo_57_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_57_ul_name     = sc_convert_encoding($this->arc_archivo_57_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name57) && '' != $this->arc_archivo__ul_name57)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name57]))
          {
              $this->arc_archivo__ul_name57 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name57];
          }
          $this->arc_archivo_57      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name57;
          $this->arc_archivo_57_scfile_name = substr($this->arc_archivo__ul_name57, 12);
          $this->arc_archivo_57_scfile_type = $this->arc_archivo__ul_type57;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_57             = sc_convert_encoding($this->arc_archivo_57,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_57_scfile_name = sc_convert_encoding($this->arc_archivo_57_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_57_ul_name     = sc_convert_encoding($this->arc_archivo_57_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_57))
      {
          $GLOBALS['arc_archivo_57']      = $this->arc_archivo_57;
          $GLOBALS['arc_archivo_57_scfile_name'] = $this->arc_archivo_57_scfile_name;
          $GLOBALS['arc_archivo_57_scfile_type'] = $this->arc_archivo_57_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name58']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name58'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name58]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name58'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name58];
          }
          $this->arc_archivo_58      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name58'];
          $this->arc_archivo_58_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name58'], 12);
          $this->arc_archivo_58_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type58'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_58             = sc_convert_encoding($this->arc_archivo_58,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_58_scfile_name = sc_convert_encoding($this->arc_archivo_58_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_58_ul_name     = sc_convert_encoding($this->arc_archivo_58_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name58) && '' != $this->arc_archivo__ul_name58)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name58]))
          {
              $this->arc_archivo__ul_name58 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name58];
          }
          $this->arc_archivo_58      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name58;
          $this->arc_archivo_58_scfile_name = substr($this->arc_archivo__ul_name58, 12);
          $this->arc_archivo_58_scfile_type = $this->arc_archivo__ul_type58;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_58             = sc_convert_encoding($this->arc_archivo_58,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_58_scfile_name = sc_convert_encoding($this->arc_archivo_58_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_58_ul_name     = sc_convert_encoding($this->arc_archivo_58_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_58))
      {
          $GLOBALS['arc_archivo_58']      = $this->arc_archivo_58;
          $GLOBALS['arc_archivo_58_scfile_name'] = $this->arc_archivo_58_scfile_name;
          $GLOBALS['arc_archivo_58_scfile_type'] = $this->arc_archivo_58_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name59']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name59'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name59]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name59'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name59];
          }
          $this->arc_archivo_59      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name59'];
          $this->arc_archivo_59_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name59'], 12);
          $this->arc_archivo_59_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type59'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_59             = sc_convert_encoding($this->arc_archivo_59,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_59_scfile_name = sc_convert_encoding($this->arc_archivo_59_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_59_ul_name     = sc_convert_encoding($this->arc_archivo_59_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name59) && '' != $this->arc_archivo__ul_name59)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name59]))
          {
              $this->arc_archivo__ul_name59 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name59];
          }
          $this->arc_archivo_59      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name59;
          $this->arc_archivo_59_scfile_name = substr($this->arc_archivo__ul_name59, 12);
          $this->arc_archivo_59_scfile_type = $this->arc_archivo__ul_type59;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_59             = sc_convert_encoding($this->arc_archivo_59,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_59_scfile_name = sc_convert_encoding($this->arc_archivo_59_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_59_ul_name     = sc_convert_encoding($this->arc_archivo_59_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_59))
      {
          $GLOBALS['arc_archivo_59']      = $this->arc_archivo_59;
          $GLOBALS['arc_archivo_59_scfile_name'] = $this->arc_archivo_59_scfile_name;
          $GLOBALS['arc_archivo_59_scfile_type'] = $this->arc_archivo_59_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name60']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name60'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name60]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name60'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name60];
          }
          $this->arc_archivo_60      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name60'];
          $this->arc_archivo_60_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name60'], 12);
          $this->arc_archivo_60_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type60'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_60             = sc_convert_encoding($this->arc_archivo_60,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_60_scfile_name = sc_convert_encoding($this->arc_archivo_60_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_60_ul_name     = sc_convert_encoding($this->arc_archivo_60_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name60) && '' != $this->arc_archivo__ul_name60)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name60]))
          {
              $this->arc_archivo__ul_name60 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name60];
          }
          $this->arc_archivo_60      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name60;
          $this->arc_archivo_60_scfile_name = substr($this->arc_archivo__ul_name60, 12);
          $this->arc_archivo_60_scfile_type = $this->arc_archivo__ul_type60;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_60             = sc_convert_encoding($this->arc_archivo_60,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_60_scfile_name = sc_convert_encoding($this->arc_archivo_60_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_60_ul_name     = sc_convert_encoding($this->arc_archivo_60_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_60))
      {
          $GLOBALS['arc_archivo_60']      = $this->arc_archivo_60;
          $GLOBALS['arc_archivo_60_scfile_name'] = $this->arc_archivo_60_scfile_name;
          $GLOBALS['arc_archivo_60_scfile_type'] = $this->arc_archivo_60_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name61']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name61'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name61]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name61'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name61];
          }
          $this->arc_archivo_61      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name61'];
          $this->arc_archivo_61_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name61'], 12);
          $this->arc_archivo_61_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type61'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_61             = sc_convert_encoding($this->arc_archivo_61,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_61_scfile_name = sc_convert_encoding($this->arc_archivo_61_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_61_ul_name     = sc_convert_encoding($this->arc_archivo_61_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name61) && '' != $this->arc_archivo__ul_name61)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name61]))
          {
              $this->arc_archivo__ul_name61 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name61];
          }
          $this->arc_archivo_61      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name61;
          $this->arc_archivo_61_scfile_name = substr($this->arc_archivo__ul_name61, 12);
          $this->arc_archivo_61_scfile_type = $this->arc_archivo__ul_type61;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_61             = sc_convert_encoding($this->arc_archivo_61,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_61_scfile_name = sc_convert_encoding($this->arc_archivo_61_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_61_ul_name     = sc_convert_encoding($this->arc_archivo_61_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_61))
      {
          $GLOBALS['arc_archivo_61']      = $this->arc_archivo_61;
          $GLOBALS['arc_archivo_61_scfile_name'] = $this->arc_archivo_61_scfile_name;
          $GLOBALS['arc_archivo_61_scfile_type'] = $this->arc_archivo_61_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name62']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name62'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name62]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name62'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name62];
          }
          $this->arc_archivo_62      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name62'];
          $this->arc_archivo_62_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name62'], 12);
          $this->arc_archivo_62_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type62'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_62             = sc_convert_encoding($this->arc_archivo_62,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_62_scfile_name = sc_convert_encoding($this->arc_archivo_62_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_62_ul_name     = sc_convert_encoding($this->arc_archivo_62_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name62) && '' != $this->arc_archivo__ul_name62)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name62]))
          {
              $this->arc_archivo__ul_name62 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name62];
          }
          $this->arc_archivo_62      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name62;
          $this->arc_archivo_62_scfile_name = substr($this->arc_archivo__ul_name62, 12);
          $this->arc_archivo_62_scfile_type = $this->arc_archivo__ul_type62;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_62             = sc_convert_encoding($this->arc_archivo_62,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_62_scfile_name = sc_convert_encoding($this->arc_archivo_62_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_62_ul_name     = sc_convert_encoding($this->arc_archivo_62_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_62))
      {
          $GLOBALS['arc_archivo_62']      = $this->arc_archivo_62;
          $GLOBALS['arc_archivo_62_scfile_name'] = $this->arc_archivo_62_scfile_name;
          $GLOBALS['arc_archivo_62_scfile_type'] = $this->arc_archivo_62_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name63']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name63'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name63]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name63'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name63];
          }
          $this->arc_archivo_63      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name63'];
          $this->arc_archivo_63_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name63'], 12);
          $this->arc_archivo_63_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type63'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_63             = sc_convert_encoding($this->arc_archivo_63,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_63_scfile_name = sc_convert_encoding($this->arc_archivo_63_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_63_ul_name     = sc_convert_encoding($this->arc_archivo_63_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name63) && '' != $this->arc_archivo__ul_name63)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name63]))
          {
              $this->arc_archivo__ul_name63 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name63];
          }
          $this->arc_archivo_63      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name63;
          $this->arc_archivo_63_scfile_name = substr($this->arc_archivo__ul_name63, 12);
          $this->arc_archivo_63_scfile_type = $this->arc_archivo__ul_type63;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_63             = sc_convert_encoding($this->arc_archivo_63,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_63_scfile_name = sc_convert_encoding($this->arc_archivo_63_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_63_ul_name     = sc_convert_encoding($this->arc_archivo_63_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_63))
      {
          $GLOBALS['arc_archivo_63']      = $this->arc_archivo_63;
          $GLOBALS['arc_archivo_63_scfile_name'] = $this->arc_archivo_63_scfile_name;
          $GLOBALS['arc_archivo_63_scfile_type'] = $this->arc_archivo_63_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name64']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name64'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name64]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name64'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name64];
          }
          $this->arc_archivo_64      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name64'];
          $this->arc_archivo_64_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name64'], 12);
          $this->arc_archivo_64_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type64'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_64             = sc_convert_encoding($this->arc_archivo_64,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_64_scfile_name = sc_convert_encoding($this->arc_archivo_64_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_64_ul_name     = sc_convert_encoding($this->arc_archivo_64_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name64) && '' != $this->arc_archivo__ul_name64)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name64]))
          {
              $this->arc_archivo__ul_name64 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name64];
          }
          $this->arc_archivo_64      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name64;
          $this->arc_archivo_64_scfile_name = substr($this->arc_archivo__ul_name64, 12);
          $this->arc_archivo_64_scfile_type = $this->arc_archivo__ul_type64;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_64             = sc_convert_encoding($this->arc_archivo_64,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_64_scfile_name = sc_convert_encoding($this->arc_archivo_64_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_64_ul_name     = sc_convert_encoding($this->arc_archivo_64_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_64))
      {
          $GLOBALS['arc_archivo_64']      = $this->arc_archivo_64;
          $GLOBALS['arc_archivo_64_scfile_name'] = $this->arc_archivo_64_scfile_name;
          $GLOBALS['arc_archivo_64_scfile_type'] = $this->arc_archivo_64_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['arc_archivo__ul_name65']) && '' != $this->NM_ajax_info['param']['arc_archivo__ul_name65'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name65]))
          {
              $this->NM_ajax_info['param']['arc_archivo__ul_name65'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name65];
          }
          $this->arc_archivo_65      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['arc_archivo__ul_name65'];
          $this->arc_archivo_65_scfile_name = substr($this->NM_ajax_info['param']['arc_archivo__ul_name65'], 12);
          $this->arc_archivo_65_scfile_type = $this->NM_ajax_info['param']['arc_archivo__ul_type65'];
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_65             = sc_convert_encoding($this->arc_archivo_65,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_65_scfile_name = sc_convert_encoding($this->arc_archivo_65_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_65_ul_name     = sc_convert_encoding($this->arc_archivo_65_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      elseif (isset($this->arc_archivo__ul_name65) && '' != $this->arc_archivo__ul_name65)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name65]))
          {
              $this->arc_archivo__ul_name65 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_field_ul_name'][$this->arc_archivo__ul_name65];
          }
          $this->arc_archivo_65      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->arc_archivo__ul_name65;
          $this->arc_archivo_65_scfile_name = substr($this->arc_archivo__ul_name65, 12);
          $this->arc_archivo_65_scfile_type = $this->arc_archivo__ul_type65;
          if ('UTF-8' != $_SESSION['scriptcase']['charset'])
          {
              $this->arc_archivo_65             = sc_convert_encoding($this->arc_archivo_65,             $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_65_scfile_name = sc_convert_encoding($this->arc_archivo_65_scfile_name, $_SESSION['scriptcase']['charset'], 'UTF-8');
              $this->arc_archivo_65_ul_name     = sc_convert_encoding($this->arc_archivo_65_ul_name,     $_SESSION['scriptcase']['charset'], 'UTF-8');
          }
      }
      if (isset($this->arc_archivo_65))
      {
          $GLOBALS['arc_archivo_65']      = $this->arc_archivo_65;
          $GLOBALS['arc_archivo_65_scfile_name'] = $this->arc_archivo_65_scfile_name;
          $GLOBALS['arc_archivo_65_scfile_type'] = $this->arc_archivo_65_scfile_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['archivos']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['archivos']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['archivos']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['dynsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      if ('total' == $this->form_paginacao)
      {
          $this->nmgp_botoes['first']   = "off";
          $this->nmgp_botoes['back']    = "off";
          $this->nmgp_botoes['forward'] = "off";
          $this->nmgp_botoes['last']    = "off";
          $this->nmgp_botoes['navpage'] = "off";
          $this->nmgp_botoes['goto']    = "off";
          $this->nmgp_botoes['qtline']  = "off";
          $this->nmgp_botoes['summary'] = "on";
      }
      else
      {
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "on";
      }
      $this->nmgp_botoes['tipo_info'] = "on";
      $this->nmgp_botoes['sc_btn_0'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['archivos']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['archivos']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['archivos']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['archivos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['archivos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['archivos']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['archivos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['archivos']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['archivos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['archivos']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['archivos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['archivos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['archivos']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['archivos']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['archivos']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['archivos']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("archivos", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'archivos_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'archivos_help.txt');
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
          require_once($this->Ini->path_embutida . 'archivos/archivos_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "archivos_erro.class.php"); 
      }
      $this->Erro      = new archivos_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($this->nmgp_opcao == "dyn_search" || $this->nmgp_opcao == "dyn_search_clear")  
      {
          $this->proc_fast_search = true;
          if ($this->nmgp_opcao == "dyn_search_clear")  
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter']);
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total']);
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_pesq']);
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search']);
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_detal'])) 
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_detal'];
              }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter'])
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter']);
                  $this->NM_ajax_info['empty_filter'] = 'ok';
                  archivos_pack_ajax_response();
                  exit;
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_clear'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_refresh'] = array();
              $this->html_dynamic_search();
          } 
          else
          {
              $this->SC_proc_dyn_search($this->nmgp_arg_dyn_search);
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opcao']))
         { 
             if ($this->arc_codigo_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['archivos']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['tipo_info'] = "on";
          $this->nmgp_botoes['sc_btn_0'] = "on";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['tipo_info'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['botoes']['tipo_info'];
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['botoes']['sc_btn_0'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- arc_codigo_
      $this->field_config['arc_codigo_']               = array();
      $this->field_config['arc_codigo_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['arc_codigo_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['arc_codigo_']['symbol_dec'] = '';
      $this->field_config['arc_codigo_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['arc_codigo_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($this->nmgp_opcao == "change_qtd_line")
      {
          if (strtolower($this->nmgp_max_line) == "all")
          {
              $this->nmgp_opcao = "inicio";
              $this->form_paginacao = "total";
          }
          else
          {
              $this->nmgp_opcao = "igual";
              $this->form_paginacao = "parcial";
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_max_reg'] = $this->nmgp_max_line;
      }
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

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opc_edit'] = true;  
      $sc_contr_vert = $GLOBALS["sc_contr_vert"];
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = NM_utf8_urldecode($this->New_Line);
         $this->NM_close_db();
         archivos_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         archivos_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->tpi_codigo_)) { $this->nm_limpa_alfa($this->tpi_codigo_); }
         if (isset($this->cla_codigo_)) { $this->nm_limpa_alfa($this->cla_codigo_); }
         if (isset($this->arc_codigo_)) { $this->nm_limpa_alfa($this->arc_codigo_); }
         if (isset($this->arc_glosa_)) { $this->nm_limpa_alfa($this->arc_glosa_); }
         if (isset($this->arc_comentario_)) { $this->nm_limpa_alfa($this->arc_comentario_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_form'][$sc_seq_vert];
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_archivos']) || !is_array($this->NM_ajax_info['errList']['geral_archivos']))
                  {
                      $this->NM_ajax_info['errList']['geral_archivos'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_archivos'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_archivos'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_archivos'][] = $this->Campos_Mens_erro;
                  }
                  $this->NM_gera_nav_page(); 
                  $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
         }
         $this->NM_close_db();
         archivos_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_tpi_codigo_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tpi_codigo_');
          }
          if ('validate_cla_codigo_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cla_codigo_');
          }
          if ('validate_arc_codigo_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'arc_codigo_');
          }
          if ('validate_arc_glosa_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'arc_glosa_');
          }
          if ('validate_arc_comentario_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'arc_comentario_');
          }
          if ('validate_arc_archivo_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'arc_archivo_');
          }
          archivos_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->tpi_codigo_ = $GLOBALS["tpi_codigo_" . $sc_seq_vert]; 
         $this->cla_codigo_ = $GLOBALS["cla_codigo_" . $sc_seq_vert]; 
         $this->arc_codigo_ = $GLOBALS["arc_codigo_" . $sc_seq_vert]; 
         $this->arc_glosa_ = $GLOBALS["arc_glosa_" . $sc_seq_vert]; 
         $this->arc_comentario_ = $GLOBALS["arc_comentario_" . $sc_seq_vert]; 
         $this->arc_archivo_ = $GLOBALS["arc_archivo_" . $sc_seq_vert]; 
         $this->arc_archivo__scfile_type = $GLOBALS["arc_archivo_"  . $sc_seq_vert . "_scfile_type"]; 
         $this->arc_archivo__scfile_name = $GLOBALS["arc_archivo_"  . $sc_seq_vert . "_scfile_name"]; 
         $this->arc_archivo__limpa = $GLOBALS["arc_archivo__limpa" . $sc_seq_vert]; 
         $this->arc_archivo__salva = $GLOBALS["arc_archivo_"  . $sc_seq_vert . "_salva"]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_form'][$sc_seq_vert];
         }
         if (isset($this->tpi_codigo_)) { $this->nm_limpa_alfa($this->tpi_codigo_); }
         if (isset($this->cla_codigo_)) { $this->nm_limpa_alfa($this->cla_codigo_); }
         if (isset($this->arc_codigo_)) { $this->nm_limpa_alfa($this->arc_codigo_); }
         if (isset($this->arc_glosa_)) { $this->nm_limpa_alfa($this->arc_glosa_); }
         if (isset($this->arc_comentario_)) { $this->nm_limpa_alfa($this->arc_comentario_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && in_array($sc_seq_vert, $sc_check_excl))
         {
             $this->nmgp_opcao = "excluir";
         }
         if ($this->nmgp_opcao == "incluir" && !in_array($sc_seq_vert, $sc_check_incl))
         { }
         else
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_disabled'] = array();
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_archivos[$sc_seq_vert]['tpi_codigo_'] =  $this->tpi_codigo_; 
             $this->form_vert_archivos[$sc_seq_vert]['cla_codigo_'] =  $this->cla_codigo_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_codigo_'] =  $this->arc_codigo_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_glosa_'] =  $this->arc_glosa_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_comentario_'] =  $this->arc_comentario_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_archivo_'] =  $this->arc_archivo_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_archivo__limpa'] =  $this->arc_archivo__limpa; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form") 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt || $this->sc_teve_excl) 
          { 
              $this->sc_after_all_update = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->nmgp_opcao == "recarga") 
      { 
          $this->NM_gera_nav_page(); 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          archivos_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_archivos);
          $this->NM_ajax_info['fldList']['arc_codigo_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['arc_codigo_']);
          $this->NM_close_db();
          archivos_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      $this->nm_gera_html();
      $this->NM_close_db(); 
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
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, $Campos_Erros, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> 
//
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              archivos_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['archivos']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
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
           case 'tpi_codigo_':
               return "Tipo Información";
               break;
           case 'cla_codigo_':
               return "Clasificación";
               break;
           case 'arc_codigo_':
               return "Código Archivo";
               break;
           case 'arc_glosa_':
               return "Glosa";
               break;
           case 'arc_comentario_':
               return "Comentario Archivo";
               break;
           case 'arc_archivo_':
               return "Archivo";
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
              if (!isset($this->NM_ajax_info['errList']['geral_archivos']) || !is_array($this->NM_ajax_info['errList']['geral_archivos']))
              {
                  $this->NM_ajax_info['errList']['geral_archivos'] = array();
              }
              $this->NM_ajax_info['errList']['geral_archivos'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'tpi_codigo_' == $filtro)
        $this->ValidateField_tpi_codigo_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cla_codigo_' == $filtro)
        $this->ValidateField_cla_codigo_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'arc_codigo_' == $filtro)
        $this->ValidateField_arc_codigo_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'arc_glosa_' == $filtro)
        $this->ValidateField_arc_glosa_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'arc_comentario_' == $filtro)
        $this->ValidateField_arc_comentario_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'arc_archivo_' == $filtro)
        $this->ValidateField_arc_archivo_($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_tpi_codigo_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->tpi_codigo_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_tpi_codigo_']) && !in_array($this->tpi_codigo_, $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_tpi_codigo_']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['tpi_codigo_']))
                   {
                       $Campos_Erros['tpi_codigo_'] = array();
                   }
                   $Campos_Erros['tpi_codigo_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['tpi_codigo_']) || !is_array($this->NM_ajax_info['errList']['tpi_codigo_']))
                   {
                       $this->NM_ajax_info['errList']['tpi_codigo_'] = array();
                   }
                   $this->NM_ajax_info['errList']['tpi_codigo_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_tpi_codigo_

    function ValidateField_cla_codigo_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->cla_codigo_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_cla_codigo_']) && !in_array($this->cla_codigo_, $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_cla_codigo_']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['cla_codigo_']))
                   {
                       $Campos_Erros['cla_codigo_'] = array();
                   }
                   $Campos_Erros['cla_codigo_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['cla_codigo_']) || !is_array($this->NM_ajax_info['errList']['cla_codigo_']))
                   {
                       $this->NM_ajax_info['errList']['cla_codigo_'] = array();
                   }
                   $this->NM_ajax_info['errList']['cla_codigo_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_cla_codigo_

    function ValidateField_arc_codigo_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->arc_codigo_ == "")  
      { 
          $this->arc_codigo_ = 0;
      } 
      nm_limpa_numero($this->arc_codigo_, $this->field_config['arc_codigo_']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->arc_codigo_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->arc_codigo_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Código Archivo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['arc_codigo_']))
                  {
                      $Campos_Erros['arc_codigo_'] = array();
                  }
                  $Campos_Erros['arc_codigo_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['arc_codigo_']) || !is_array($this->NM_ajax_info['errList']['arc_codigo_']))
                  {
                      $this->NM_ajax_info['errList']['arc_codigo_'] = array();
                  }
                  $this->NM_ajax_info['errList']['arc_codigo_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->arc_codigo_, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Código Archivo; " ; 
                  if (!isset($Campos_Erros['arc_codigo_']))
                  {
                      $Campos_Erros['arc_codigo_'] = array();
                  }
                  $Campos_Erros['arc_codigo_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['arc_codigo_']) || !is_array($this->NM_ajax_info['errList']['arc_codigo_']))
                  {
                      $this->NM_ajax_info['errList']['arc_codigo_'] = array();
                  }
                  $this->NM_ajax_info['errList']['arc_codigo_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_arc_codigo_

    function ValidateField_arc_glosa_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->arc_glosa_) > 100) 
          { 
              $Campos_Crit .= "Glosa " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['arc_glosa_']))
              {
                  $Campos_Erros['arc_glosa_'] = array();
              }
              $Campos_Erros['arc_glosa_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['arc_glosa_']) || !is_array($this->NM_ajax_info['errList']['arc_glosa_']))
              {
                  $this->NM_ajax_info['errList']['arc_glosa_'] = array();
              }
              $this->NM_ajax_info['errList']['arc_glosa_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_arc_glosa_

    function ValidateField_arc_comentario_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->arc_comentario_) > 500) 
          { 
              $Campos_Crit .= "Comentario Archivo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 500 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['arc_comentario_']))
              {
                  $Campos_Erros['arc_comentario_'] = array();
              }
              $Campos_Erros['arc_comentario_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 500 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['arc_comentario_']) || !is_array($this->NM_ajax_info['errList']['arc_comentario_']))
              {
                  $this->NM_ajax_info['errList']['arc_comentario_'] = array();
              }
              $this->NM_ajax_info['errList']['arc_comentario_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 500 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_arc_comentario_

    function ValidateField_arc_archivo_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->arc_archivo_;
            if ("" != $this->arc_archivo_ && "S" != $this->arc_archivo__limpa && !$teste_validade->ArqExtensao($this->arc_archivo_, array()))
            {
                $Campos_Crit .= "Archivo: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['arc_archivo_']))
                {
                    $Campos_Erros['arc_archivo_'] = array();
                }
                $Campos_Erros['arc_archivo_'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['arc_archivo_']) || !is_array($this->NM_ajax_info['errList']['arc_archivo_']))
                {
                    $this->NM_ajax_info['errList']['arc_archivo_'] = array();
                }
                $this->NM_ajax_info['errList']['arc_archivo_'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
    } // ValidateField_arc_archivo_
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros) 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->arc_archivo_ == "none") 
          { 
              $this->arc_archivo_ = ""; 
          } 
          if ($this->arc_archivo_ != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'archivos_doc_name.php';
              }
              $this->arc_archivo_ = sc_upload_unprotect_chars($this->arc_archivo_);
              $this->arc_archivo__scfile_name = sc_upload_unprotect_chars($this->arc_archivo__scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->arc_archivo__scfile_type = substr($this->arc_archivo__scfile_type, 0, strpos($this->arc_archivo__scfile_type, ";")) ; 
              } 
              if ($this->arc_archivo__scfile_type == "image/pjpeg" || $this->arc_archivo__scfile_type == "image/jpeg" || $this->arc_archivo__scfile_type == "image/gif" ||  
                  $this->arc_archivo__scfile_type == "image/png" || $this->arc_archivo__scfile_type == "image/x-png" || $this->arc_archivo__scfile_type == "image/bmp")  
              { 
                  if (is_file($this->arc_archivo_))  
                  { 
                      $reg_arc_archivo_ = file_get_contents($this->arc_archivo_); 
                      $this->arc_archivo_ = $reg_arc_archivo_; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Archivo " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->arc_archivo_ = "";
                      if (!isset($Campos_Erros['arc_archivo_']))
                      {
                          $Campos_Erros['arc_archivo_'] = array();
                      }
                      $Campos_Erros['arc_archivo_'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['arc_archivo_']) || !is_array($this->NM_ajax_info['errList']['arc_archivo_']))
                      {
                          $this->NM_ajax_info['errList']['arc_archivo_'] = array();
                      }
                      $this->NM_ajax_info['errList']['arc_archivo_'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->arc_archivo_ = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "Archivo " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['arc_archivo_']))
                      {
                          $Campos_Erros['arc_archivo_'] = array();
                      }
                      $Campos_Erros['arc_archivo_'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['arc_archivo_']) || !is_array($this->NM_ajax_info['errList']['arc_archivo_']))
                      {
                          $this->NM_ajax_info['errList']['arc_archivo_'] = array();
                      }
                      $this->NM_ajax_info['errList']['arc_archivo_'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_form']['arc_archivo_']) && $this->arc_archivo__limpa != "S")
          {
              $this->arc_archivo_ = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_form']['arc_archivo_'];
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
    $this->nmgp_dados_form['tpi_codigo_'] = $this->tpi_codigo_;
    $this->nmgp_dados_form['cla_codigo_'] = $this->cla_codigo_;
    $this->nmgp_dados_form['arc_codigo_'] = $this->arc_codigo_;
    $this->nmgp_dados_form['arc_glosa_'] = $this->arc_glosa_;
    $this->nmgp_dados_form['arc_comentario_'] = $this->arc_comentario_;
    $this->nmgp_dados_form['arc_archivo_'] = $this->arc_archivo_;
    $this->nmgp_dados_form['arc_archivo__limpa'] = $this->arc_archivo__limpa;
    $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->arc_codigo_, $this->field_config['arc_codigo_']['symbol_grp']) ; 
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
      if ($Nome_Campo == "arc_codigo_")
      {
          nm_limpa_numero($this->arc_codigo_, $this->field_config['arc_codigo_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if (!empty($this->arc_codigo_) || (!empty($format_fields) && isset($format_fields['arc_codigo_'])))
      {
          nmgp_Form_Num_Val($this->arc_codigo_, $this->field_config['arc_codigo_']['symbol_grp'], $this->field_config['arc_codigo_']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['arc_codigo_']['symbol_fmt']) ; 
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
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['arc_codigo_']['keyVal'] = archivos_pack_protect_string($this->nmgp_dados_form['arc_codigo_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_archivos[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['tpi_codigo_']) && $this->NM_ajax_changed['tpi_codigo_'])
                  {
                      $this->form_vert_archivos[$this->nmgp_refresh_row]['tpi_codigo_'] = $this->tpi_codigo_;
                  }
                  if (isset($this->NM_ajax_changed['cla_codigo_']) && $this->NM_ajax_changed['cla_codigo_'])
                  {
                      $this->form_vert_archivos[$this->nmgp_refresh_row]['cla_codigo_'] = $this->cla_codigo_;
                  }
                  if (isset($this->NM_ajax_changed['arc_codigo_']) && $this->NM_ajax_changed['arc_codigo_'])
                  {
                      $this->form_vert_archivos[$this->nmgp_refresh_row]['arc_codigo_'] = $this->arc_codigo_;
                  }
                  if (isset($this->NM_ajax_changed['arc_glosa_']) && $this->NM_ajax_changed['arc_glosa_'])
                  {
                      $this->form_vert_archivos[$this->nmgp_refresh_row]['arc_glosa_'] = $this->arc_glosa_;
                  }
                  if (isset($this->NM_ajax_changed['arc_comentario_']) && $this->NM_ajax_changed['arc_comentario_'])
                  {
                      $this->form_vert_archivos[$this->nmgp_refresh_row]['arc_comentario_'] = $this->arc_comentario_;
                  }
                  if (isset($this->NM_ajax_changed['arc_archivo_']) && $this->NM_ajax_changed['arc_archivo_'])
                  {
                      $this->form_vert_archivos[$this->nmgp_refresh_row]['arc_archivo_'] = $this->arc_archivo_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_archivos[$this->nmgp_refresh_row]['arc_glosa_'] = $this->arc_glosa_;
              $this->form_vert_archivos[$this->nmgp_refresh_row]['arc_comentario_'] = $this->arc_comentario_;
              if ('' == $this->form_vert_archivos[$this->nmgp_refresh_row]['arc_archivo_'] && '' != $this->arc_archivo_)
              {
                  $this->form_vert_archivos[$this->nmgp_refresh_row]['arc_archivo_'] = $this->arc_archivo_;
              }
          }
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_archivos);
          foreach($this->form_vert_archivos as $sc_seq_vert => $aRecData)
          {
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tpi_codigo_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tpi_codigo_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_tpi_codigo_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_tpi_codigo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_tpi_codigo_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_tpi_codigo_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_arc_codigo_ = $this->arc_codigo_;
   $this->nm_tira_formatacao();


   $unformatted_value_arc_codigo_ = $this->arc_codigo_;

   $nm_comando = "SELECT tpi_codigo, tpi_descripcion 
FROM tbl_tipo_informacion 
ORDER BY tpi_descripcion";

   $this->arc_codigo_ = $old_value_arc_codigo_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(archivos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => archivos_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_tpi_codigo_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"tpi_codigo_\"";
          if (isset($this->NM_ajax_info['select_html']['tpi_codigo_']) && !empty($this->NM_ajax_info['select_html']['tpi_codigo_']))
          {
              eval("\$sSelComp = \"" . $this->NM_ajax_info['select_html']['tpi_codigo_'] . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['tpi_codigo_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tpi_codigo_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tpi_codigo_' . $sc_seq_vert]['valList'][$i] = archivos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tpi_codigo_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tpi_codigo_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tpi_codigo_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cla_codigo_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cla_codigo_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_cla_codigo_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_cla_codigo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_cla_codigo_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_cla_codigo_'] = array(); 
}
   $this->tpi_codigo_ = $this->form_vert_archivos[$sc_seq_vert]['tpi_codigo_'];
if ($this->tpi_codigo_ != "")
{ 
   $this->nm_clear_val("tpi_codigo_");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_arc_codigo_ = $this->arc_codigo_;
   $this->nm_tira_formatacao();


   $unformatted_value_arc_codigo_ = $this->arc_codigo_;

   $nm_comando = "SELECT cla_codigo, cla_descripcion 
FROM tbl_clasificacion 
where tbl_clasificacion.tpi_codigo = '$this->tpi_codigo_'
ORDER BY cla_descripcion";

   $this->arc_codigo_ = $old_value_arc_codigo_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(archivos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => archivos_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_cla_codigo_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"cla_codigo_\"";
          if (isset($this->NM_ajax_info['select_html']['cla_codigo_']) && !empty($this->NM_ajax_info['select_html']['cla_codigo_']))
          {
              eval("\$sSelComp = \"" . $this->NM_ajax_info['select_html']['cla_codigo_'] . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['cla_codigo_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cla_codigo_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cla_codigo_' . $sc_seq_vert]['valList'][$i] = archivos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cla_codigo_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cla_codigo_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cla_codigo_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("arc_codigo_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['arc_codigo_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['arc_codigo_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("arc_glosa_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['arc_glosa_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['arc_glosa_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("arc_comentario_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['arc_comentario_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['arc_comentario_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("arc_archivo_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['arc_archivo_']);
                  $aLookup = array();
   $sKeepImage = 'N';
   if ('' == $aRecData['arc_archivo_'] && isset($aRecData['arc_archivo__limpa']) && 'N' == $aRecData['arc_archivo__limpa'])
   {
       $sKeepImage = 'S';
   }
   $out_arc_archivo_ = '';
   $out1_arc_archivo_ = '';
   $guarda_arc_archivo_ = $this->arc_archivo_;
   $this->arc_archivo_  = $aRecData['arc_archivo_'];
   if ($this->arc_archivo_ != "" && $this->arc_archivo_ != "none")   
   { 
       $out_arc_archivo_ = $this->Ini->path_imag_temp . "/sc_arc_archivo__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_arc_archivo_ = $out_arc_archivo_; 
       $arq_arc_archivo_ = fopen($this->Ini->root . $out_arc_archivo_, "w") ;  
       if (substr($this->arc_archivo_, 0, 4) == "*nm*") 
       { 
           $this->arc_archivo_ = substr($this->arc_archivo_, 4) ; 
           $this->arc_archivo_ = base64_decode($this->arc_archivo_) ; 
       } 
       $img_pos_bm = strpos($this->arc_archivo_, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->arc_archivo_ = substr($this->arc_archivo_, $img_pos_bm) ; 
       } 
       fwrite($arq_arc_archivo_, $this->arc_archivo_) ;  
       fclose($arq_arc_archivo_) ;  
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       $out_arc_archivo_ = $this->Ini->path_imag_temp . "/sc_" . "arc_archivo__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_arc_archivo_);
           $sc_obj_img->setWidth(100);
           $sc_obj_img->setHeight(100);
           $sc_obj_img->createImg($this->Ini->root . $out_arc_archivo_);
       } 
       else 
       { 
           $out_arc_archivo_ = $out1_arc_archivo_;
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   $this->arc_archivo_  = $guarda_arc_archivo_;
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['arc_archivo_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'imagem',
                       'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
                       'imgFile' => $out_arc_archivo_,
                       'imgOrig' => $out1_arc_archivo_,
               'keepImg' => $sKeepImage,
                       );
              }
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['upload_dir'][$fieldName][] = $newName;
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
  function nm_proc_onload_record($sc_seq_vert=0)
  {
  }
  function nm_proc_onload($bFormat = true)
  {
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
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
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
      if ($this->nmgp_opcao == "alterar")
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['tpi_codigo_'] == $this->tpi_codigo_ &&
              $this->nmgp_dados_select['cla_codigo_'] == $this->cla_codigo_ &&
              $this->nmgp_dados_select['arc_codigo_'] == $this->arc_codigo_ &&
              $this->nmgp_dados_select['arc_glosa_'] == $this->arc_glosa_ &&
              $this->nmgp_dados_select['arc_comentario_'] == $this->arc_comentario_ &&
              $this->nmgp_dados_select['arc_archivo_'] == $this->arc_archivo_)
          {
              $SC_ex_update = false; 
              $SC_ex_upd_or = false; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert]['tpi_codigo_'] = $this->tpi_codigo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert]['cla_codigo_'] = $this->cla_codigo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert]['arc_codigo_'] = $this->arc_codigo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert]['arc_glosa_'] = $this->arc_glosa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert]['arc_comentario_'] = $this->arc_comentario_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert]['arc_archivo_'] = $this->arc_archivo_;
          }
      }
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
      $NM_val_form['tpi_codigo_'] = $this->tpi_codigo_;
      $NM_val_form['cla_codigo_'] = $this->cla_codigo_;
      $NM_val_form['arc_codigo_'] = $this->arc_codigo_;
      $NM_val_form['arc_glosa_'] = $this->arc_glosa_;
      $NM_val_form['arc_comentario_'] = $this->arc_comentario_;
      $NM_val_form['arc_archivo_'] = $this->arc_archivo_;
      if ($this->tpi_codigo_ == "")  
      { 
          $this->tpi_codigo_ = 0;
          $this->sc_force_zero[] = 'tpi_codigo_';
      } 
      if ($this->cla_codigo_ == "")  
      { 
          $this->cla_codigo_ = 0;
          $this->sc_force_zero[] = 'cla_codigo_';
      } 
      if ($this->arc_codigo_ == "")  
      { 
          $this->arc_codigo_ = 0;
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->arc_glosa__before_qstr = $this->arc_glosa_;
          $this->arc_glosa_ = substr($this->Db->qstr($this->arc_glosa_), 1, -1); 
          $this->arc_comentario__before_qstr = $this->arc_comentario_;
          $this->arc_comentario_ = substr($this->Db->qstr($this->arc_comentario_), 1, -1); 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              if (!empty($this->arc_archivo_) && $this->arc_archivo_ != 'null' && substr($this->arc_archivo_, 0, 4) != "*nm*") 
              { 
                  $this->arc_archivo_ = "*nm*" . base64_encode($this->arc_archivo_) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { }
          else
          { 
              $this->arc_archivo_ =  substr($this->Db->qstr($this->arc_archivo_), 1, -1);
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo_ ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo_ "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 archivos_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_nfnd']; 
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
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET tpi_codigo = $this->tpi_codigo_, cla_codigo = $this->cla_codigo_, arc_glosa = '$this->arc_glosa_', arc_comentario = '$this->arc_comentario_'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET tpi_codigo = $this->tpi_codigo_, cla_codigo = $this->cla_codigo_, arc_glosa = '$this->arc_glosa_', arc_comentario = '$this->arc_comentario_'";  
              } 
              $aDoNotUpdate = array();
              $temp_cmd_sql = "";
              if ($this->arc_archivo__limpa == "S") 
              { 
                  if ($this->arc_archivo_ != "null") 
                  { 
                      $this->arc_archivo_ = ''; 
                  } 
                  if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                  { 
                      $temp_cmd_sql .= ", arc_archivo = '" . $this->arc_archivo_ . "'"; 
                  } 
                  else 
                  { 
                     $temp_cmd_sql .= " arc_archivo = '" . $this->arc_archivo_ . "'"; 
                     $SC_ex_update = true; 
                  } 
                  $this->arc_archivo_ = "";
              } 
              else 
              { 
                  if ($this->arc_archivo_ != "none" && $this->arc_archivo_ != "") 
                  { 
                      $NM_conteudo =  $this->arc_archivo_;
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
                      $aDoNotUpdate[] = "arc_archivo_";
                  }
              } 
              if (!empty($temp_cmd_sql)) 
              { 
                  $comando .= $temp_cmd_sql;
              } 
              if ($this->arc_archivo__limpa == "S" || ($this->arc_archivo_ != "none" && $this->arc_archivo_ != "")) 
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
              $comando .= " WHERE arc_codigo = $this->arc_codigo_ ";  
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
                                  archivos_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if ($this->arc_archivo__limpa == "S" && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"arc_archivo\", \"\",  \"arc_codigo = $this->arc_codigo_\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "arc_archivo", "",  "arc_codigo = $this->arc_codigo_"); 
                  } 
                  else 
                  { 
                      if ($this->arc_archivo_ != "none" && $this->arc_archivo_ != "") 
                      { 
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"arc_archivo\", $this->arc_archivo_,  \"arc_codigo = $this->arc_codigo_\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "arc_archivo", $this->arc_archivo_,  "arc_codigo = $this->arc_codigo_"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          archivos_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->arc_archivo__limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['arc_archivo__salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
          $this->arc_glosa_ = $this->arc_glosa__before_qstr;
          $this->arc_comentario_ = $this->arc_comentario__before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 

              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['db_changed'] = true;

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['tpi_codigo_'])) { $this->tpi_codigo_ = $NM_val_form['tpi_codigo_']; }
              elseif (isset($this->tpi_codigo_)) { $this->nm_limpa_alfa($this->tpi_codigo_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cla_codigo_'])) { $this->cla_codigo_ = $NM_val_form['cla_codigo_']; }
              elseif (isset($this->cla_codigo_)) { $this->nm_limpa_alfa($this->cla_codigo_); }
              if     (isset($NM_val_form) && isset($NM_val_form['arc_codigo_'])) { $this->arc_codigo_ = $NM_val_form['arc_codigo_']; }
              elseif (isset($this->arc_codigo_)) { $this->nm_limpa_alfa($this->arc_codigo_); }
              if     (isset($NM_val_form) && isset($NM_val_form['arc_glosa_'])) { $this->arc_glosa_ = $NM_val_form['arc_glosa_']; }
              elseif (isset($this->arc_glosa_)) { $this->nm_limpa_alfa($this->arc_glosa_); }
              if     (isset($NM_val_form) && isset($NM_val_form['arc_comentario_'])) { $this->arc_comentario_ = $NM_val_form['arc_comentario_']; }
              elseif (isset($this->arc_comentario_)) { $this->nm_limpa_alfa($this->arc_comentario_); }
              $this->nm_proc_onload_record($this->nmgp_refresh_row);

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('tpi_codigo_', 'cla_codigo_', 'arc_codigo_', 'arc_glosa_', 'arc_comentario_'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['tpi_codigo_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cla_codigo_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['arc_codigo_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['arc_glosa_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['arc_comentario_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['arc_archivo_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "arc_codigo, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->arc_archivo__scfile_name, $dir_file, "arc_archivo_");
              if (trim($this->arc_archivo__scfile_name) != $_test_file)
              {
                  $this->arc_archivo__scfile_name = $_test_file;
                  $this->arc_archivo_ = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tpi_codigo, cla_codigo, arc_glosa, arc_comentario, arc_archivo) VALUES (" . $NM_seq_auto . "$this->tpi_codigo_, $this->cla_codigo_, '$this->arc_glosa_', '$this->arc_comentario_', '')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tpi_codigo, cla_codigo, arc_glosa, arc_comentario, arc_archivo) VALUES (" . $NM_seq_auto . "$this->tpi_codigo_, $this->cla_codigo_, '$this->arc_glosa_', '$this->arc_comentario_', '$this->arc_archivo_')"; 
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
                              archivos_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->arc_codigo_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->arc_codigo_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->arc_archivo_ ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  arc_archivo , $this->arc_archivo_,  \"arc_codigo = $this->arc_codigo_\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "arc_archivo", $this->arc_archivo_,  "arc_codigo = $this->arc_codigo_"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              archivos_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_qtd']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_I_E']++; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total'] + 1; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert]['tpi_codigo_'] = $this->tpi_codigo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert]['cla_codigo_'] = $this->cla_codigo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert]['arc_codigo_'] = $this->arc_codigo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert]['arc_glosa_'] = $this->arc_glosa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert]['arc_comentario_'] = $this->arc_comentario_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert]['arc_archivo_'] = $this->arc_archivo_;
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
              if (isset($this->tpi_codigo_)) { $this->nm_limpa_alfa($this->tpi_codigo_); }
              if (isset($this->cla_codigo_)) { $this->nm_limpa_alfa($this->cla_codigo_); }
              if (isset($this->arc_codigo_)) { $this->nm_limpa_alfa($this->arc_codigo_); }
              if (isset($this->arc_glosa_)) { $this->nm_limpa_alfa($this->arc_glosa_); }
              if (isset($this->arc_comentario_)) { $this->nm_limpa_alfa($this->arc_comentario_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_proc_onload_record($this->nmgp_refresh_row);
                  $this->nm_formatar_campos();

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_tpi_codigo_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_tpi_codigo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_tpi_codigo_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_tpi_codigo_'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_arc_codigo_ = $this->arc_codigo_;
   $this->nm_tira_formatacao();


   $unformatted_value_arc_codigo_ = $this->arc_codigo_;

   $nm_comando = "SELECT tpi_codigo, tpi_descripcion 
FROM tbl_tipo_informacion 
ORDER BY tpi_descripcion";

   $this->arc_codigo_ = $old_value_arc_codigo_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(archivos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => archivos_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_tpi_codigo_'][] = $rs->fields[0];
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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == archivos_pack_protect_string(NM_charset_to_utf8($this->tpi_codigo_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_tpi_codigo_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['tpi_codigo_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['tpi_codigo_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->tpi_codigo_));
                  $this->NM_ajax_info['fldList']['tpi_codigo_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_tpi_codigo_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tpi_codigo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tpi_codigo_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tpi_codigo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tpi_codigo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_cla_codigo_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_cla_codigo_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_cla_codigo_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_cla_codigo_'] = array(); 
}
if ($this->tpi_codigo_ != "")
{ 
   $this->nm_clear_val("tpi_codigo_");
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_arc_codigo_ = $this->arc_codigo_;
   $this->nm_tira_formatacao();


   $unformatted_value_arc_codigo_ = $this->arc_codigo_;

   $nm_comando = "SELECT cla_codigo, cla_descripcion 
FROM tbl_clasificacion 
where tbl_clasificacion.tpi_codigo = '$this->tpi_codigo_'
ORDER BY cla_descripcion";

   $this->arc_codigo_ = $old_value_arc_codigo_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(archivos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => archivos_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['Lookup_cla_codigo_'][] = $rs->fields[0];
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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == archivos_pack_protect_string(NM_charset_to_utf8($this->cla_codigo_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_cla_codigo_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['cla_codigo_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['cla_codigo_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->cla_codigo_));
                  $this->NM_ajax_info['fldList']['cla_codigo_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_cla_codigo_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cla_codigo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cla_codigo_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cla_codigo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cla_codigo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['arc_codigo_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['arc_codigo_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->arc_codigo_));
                  $this->NM_ajax_info['fldList']['arc_codigo_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_arc_codigo_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['arc_codigo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['arc_codigo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['arc_codigo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['arc_codigo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['arc_glosa_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['arc_glosa_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->arc_glosa_));
                  $this->NM_ajax_info['fldList']['arc_glosa_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_arc_glosa_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['arc_glosa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['arc_glosa_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['arc_glosa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['arc_glosa_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['arc_comentario_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['arc_comentario_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->arc_comentario_));
                  $this->NM_ajax_info['fldList']['arc_comentario_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_arc_comentario_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['arc_comentario_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['arc_comentario_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['arc_comentario_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['arc_comentario_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

   if ($this->arc_archivo_ != "" && $this->arc_archivo_ != "none")   
   { 
       $this->arc_archivo_ = $NM_val_form['arc_archivo_'];
       $out_arc_archivo_ = $this->Ini->path_imag_temp . "/sc_arc_archivo__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_arc_archivo_ = $out_arc_archivo_; 
       $arq_arc_archivo_ = fopen($this->Ini->root . $out_arc_archivo_, "w") ;  
       $img_pos_bm = strpos($this->arc_archivo_, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->arc_archivo_ = substr($this->arc_archivo_, $img_pos_bm) ; 
       } 
       fwrite($arq_arc_archivo_, $this->arc_archivo_) ;  
       fclose($arq_arc_archivo_) ;  
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       $out_arc_archivo_ = $this->Ini->path_imag_temp . "/sc_" . "arc_archivo__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_arc_archivo_);
           $sc_obj_img->setWidth(100);
           $sc_obj_img->setHeight(100);
           $sc_obj_img->createImg($this->Ini->root . $out_arc_archivo_);
       } 
       else 
       { 
           $out_arc_archivo_ = $out1_arc_archivo_;
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   if ($this->Embutida_ronly)
   {
       $this->NM_ajax_info['fldList']['arc_archivo_' . $this->nmgp_refresh_row]['keepImg'] = 'S';
   }
                  $this->NM_ajax_info['fldList']['arc_archivo_' . $this->nmgp_refresh_row]['imgFile'] = $out_arc_archivo_;
                  $this->NM_ajax_info['fldList']['arc_archivo_' . $this->nmgp_refresh_row]['imgOrig'] = $out1_arc_archivo_;
                  $this->NM_ajax_info['fldList']['arc_archivo_' . $this->nmgp_refresh_row]['type']    = 'imagem';
                  $this->NM_ajax_info['fldList']['arc_archivo_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->arc_archivo_));
                  $this->NM_ajax_info['fldList']['arc_archivo_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_arc_archivo_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['arc_archivo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['arc_archivo_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['arc_archivo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['arc_archivo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->arc_codigo_ = substr($this->Db->qstr($this->arc_codigo_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo_"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo_ "); 
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
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_dele_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo_ "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where arc_codigo = $this->arc_codigo_ "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          archivos_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['db_changed'] = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_qtd']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_I_E']--; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total'] + 1; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_excl = true; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['parms'] = "arc_codigo_?#?$this->arc_codigo_?@?"; 
      }
      $this->nmgp_dados_form['arc_archivo_'] = ""; 
      $this->arc_archivo__limpa = ""; 
      $this->arc_archivo__salva = ""; 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->arc_codigo_ = substr($this->Db->qstr($this->arc_codigo_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['archivos']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['archivos']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['archivos']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['archivos']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['archivos']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_max_reg'];
      } 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_archivos = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['parms'] = ""; 
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter'] . ")";
          }
      }
      $sc_where = "";
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (((isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao) || (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)) && !$this->has_where_params && 'novo' != $this->nmgp_opcao)
      {
          $aNewWhereCond = array();
          if (null != $this->arc_codigo_)
          {
              $aNewWhereCond[] = "arc_codigo = " . $this->arc_codigo_;
          }
          if (!empty($aNewWhereCond))
          {
              if ('' == $sc_where)
              {
                  $sc_where = " where (";
              }
              else
              {
                  $sc_where .= " and (";
              }
              $sc_where .= implode(" and ", $aNewWhereCond) . ")";
          }
      }
      if ('total' != $this->form_paginacao)
      {
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total']))
          {
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_archivos = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total'] = $qt_geral_reg_archivos;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_I_E'] = 0; 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->arc_codigo_))
          {
              $Key_Where = "arc_codigo < $this->arc_codigo_ "; 
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_archivos = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_archivos) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] += ($this->sc_max_reg + $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_I_E']); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] > $qt_geral_reg_archivos)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] = $qt_geral_reg_archivos - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] = ($qt_geral_reg_archivos + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] = 0; 
          }
      } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_I_E'] = 0; 
      }
      $Cmps_ord_def = array();
      $sc_order_by  = "";
      $sc_order_by = "arc_codigo";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['ordem_ord']; 
      } 
      $nmgp_select = "SELECT tpi_codigo, cla_codigo, arc_codigo, arc_glosa, arc_comentario, arc_archivo from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = $this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start']) ;  
                  } 
              } 
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
          if ($rs->EOF && !$this->proc_fast_search && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter'])) 
          { 
              $this->nm_flag_saida_novo = "S"; 
              $this->nmgp_opcao = "novo"; 
              $this->sc_evento  = "novo"; 
              $this->nmgp_botoes['tipo_info'] = "on";
              $this->nmgp_botoes['sc_btn_0'] = "on";
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on" && !$this->proc_fast_search)
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter'] = true;
              }
          }
          else
          {
              $sc_seq_vert = 1; 
          }
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
              $this->sc_max_reg = 0;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          while (!$rs->EOF && $bPagTest)
          { 
              if ('total' == $this->form_paginacao)
              {
                  $this->sc_max_reg++;
              }
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->tpi_codigo_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['tpi_codigo_'] = $this->tpi_codigo_;
              $this->cla_codigo_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['cla_codigo_'] = $this->cla_codigo_;
              $this->arc_codigo_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['arc_codigo_'] = $this->arc_codigo_;
              $this->arc_glosa_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['arc_glosa_'] = $this->arc_glosa_;
              $this->arc_comentario_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['arc_comentario_'] = $this->arc_comentario_;
              $this->arc_archivo_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['arc_archivo_'] = $this->arc_archivo_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->tpi_codigo_ = (string)$this->tpi_codigo_; 
              $this->cla_codigo_ = (string)$this->cla_codigo_; 
              $this->arc_codigo_ = (string)$this->arc_codigo_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['parms'] = "arc_codigo_?#?$this->arc_codigo_?@?";
              } 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sub_dir'][0]  = "";
              $this->nm_proc_onload_record($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_archivos[$sc_seq_vert]['tpi_codigo_'] =  $this->tpi_codigo_; 
             $this->form_vert_archivos[$sc_seq_vert]['cla_codigo_'] =  $this->cla_codigo_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_codigo_'] =  $this->arc_codigo_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_glosa_'] =  $this->arc_glosa_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_comentario_'] =  $this->arc_comentario_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_archivo_'] =  $this->arc_archivo_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_archivo__limpa'] =  $this->arc_archivo__limpa; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          ksort ($this->form_vert_archivos); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total'] + 1; 
          }
          if ($this->form_paginacao == "total")
          {
              $this->SC_nav_page = "";
          }
          else
          {
              $this->NM_gera_nav_page(); 
          }
          $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] < (($qt_geral_reg_archivos + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opcao'] = '';
          }
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_evento = "novo"; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          else 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->tpi_codigo_ = "";  
              $this->cla_codigo_ = "";  
              $this->arc_codigo_ = "";  
              $this->arc_glosa_ = "";  
              $this->arc_comentario_ = "";  
              $this->arc_archivo_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      if (isset($this->sc_conv_var[$sFKName]))
                      {
                          $sFKName = $this->sc_conv_var[$sFKName];
                      }
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_archivos[$sc_seq_vert]['tpi_codigo_'] =  $this->tpi_codigo_; 
             $this->form_vert_archivos[$sc_seq_vert]['cla_codigo_'] =  $this->cla_codigo_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_codigo_'] =  $this->arc_codigo_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_glosa_'] =  $this->arc_glosa_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_comentario_'] =  $this->arc_comentario_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_archivo_'] =  $this->arc_archivo_; 
             $this->form_vert_archivos[$sc_seq_vert]['arc_archivo__limpa'] =  $this->arc_archivo__limpa; 
              $sc_seq_vert++; 
          } 
      }  
  }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = $this->sc_max_reg;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['reg_start'] + $this->sc_max_reg;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              archivos_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['table_refresh'] = true;
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['csrf_token'];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              archivos_pack_ajax_response();
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
          $data_lookup = $this->SC_lookup_tpi_codigo_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "tpi_codigo", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_cla_codigo_($arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "arc_glosa", $arg_search, $data_search);
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
          $data_lookup = $this->SC_lookup_tpi_codigo_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "tpi_codigo", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_cla_codigo_($arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "arc_glosa", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "arc_comentario", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_archivos = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total'] = $qt_geral_reg_archivos;
      $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          archivos_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          archivos_pack_ajax_response();
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
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['decimal_db'] == ".")
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
   function SC_lookup_tpi_codigo_($condicao, $campo)
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
   function SC_lookup_cla_codigo_($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT cla_descripcion, cla_codigo, tbl_clasificacion.tpi_codigo FROM tbl_clasificacion WHERE (cla_descripcion LIKE '%$campo%')" ; 
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
   function html_dynamic_search()
   {
       $this->Dyn_search_seq = 0;
       $this->Dyn_search_str = "";
       $this->Dyn_search_dat = array();
      $this->Dyn_search_str = "";
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_pesq']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_pesq']))
       {
           $tmp = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_pesq'];
           $pos = strrpos($tmp, "##*@@");
           if ($pos !== false)
           {
               $and_or = (substr($tmp, ($pos + 5)) == "and") ? $this->Ini->Nm_lang['lang_srch_and_cond'] : $this->Ini->Nm_lang['lang_srch_orr_cond'];
               $tmp    = substr($tmp, 0, $pos);
               $this->Dyn_search_str = str_replace("##*@@", ", " . $and_or . " ", $tmp);
           }
       }
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'] = NM_charset_to_utf8(trim($this->Dyn_search_str));
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_clear']))
           {
               return;
           }
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_label'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_label']['tpi_codigo_'] = (isset($this->New_label['tpi_codigo_'])) ? $this->New_label['tpi_codigo_'] : "Tipo Información";
       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_label']['cla_codigo_'] = (isset($this->New_label['cla_codigo_'])) ? $this->New_label['cla_codigo_'] : "Clasificación";
       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_label']['arc_codigo_'] = (isset($this->New_label['arc_codigo_'])) ? $this->New_label['arc_codigo_'] : "Código Archivo";
       if ($this->NM_ajax_flag)
       { 
          ob_start();
       } 
       else 
       { 
?>
   <tr id="NM_Dynamic_Search">
<?php
       } 
?>
   <td  valign="top"> 
   <div id='id_dyn_search_cmd_string' class="scAppDivMoldura" style="display:<?php echo (empty($this->Dyn_search_str)?'none':'') ?>"> 
     <span class="css_scAppDivHeaderText">
<?php
             if (is_file($this->Ini->root . $this->Ini->path_img_global . '/' . $this->Ini->App_div_tree_img_exp))
             {
?>
                             <a href="#" onclick="$('#id_dyn_search_cmd_string').hide();$('#div_dyn_search').show();" style="text-decoration:none">
                                     <img id='id_app_div_tree_img_exp' src="<?php echo $this->Ini->path_img_global ?>/<?php echo $this->Ini->App_div_tree_img_exp ?>" border=0 align='absmiddle' style='vertical-align: middle; margin-right:4px;'>
                             </a>
<?php
             }
             echo $this->Ini->Nm_lang['lang_othr_dynamicsearch_title_outside'];
?>
     </span>
     <span id='id_dyn_search_cmd_str' class="scAppDivContentText"><?php echo trim($this->Dyn_search_str) ?></span>
   </div> 
   <div id="div_dyn_search" style="display: none" class="scAppDivMoldura"> 
     <input type="hidden" name="parm_dyn_search" value=""/> 
    <table style="padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top; width: 100%;" valign="top" cellspacing=0 cellpadding=0>
      <tr>
        <td  class="css_scAppDivHeader scAppDivHeaderText">
<?php
             if (is_file($this->Ini->root . $this->Ini->path_img_global . '/' . $this->Ini->App_div_tree_img_col))
             {
?>
                             <a href="#" onclick="$('#div_dyn_search').hide(); if($('#id_dyn_search_cmd_str').html() != ''){ $('#id_dyn_search_cmd_string').show(); }" style="text-decoration:none">
                                     <img id='id_app_div_tree_img_col' src="<?php echo $this->Ini->path_img_global ?>/<?php echo $this->Ini->App_div_tree_img_col ?>" border=0 align='absmiddle' style='vertical-align: middle; margin-right:4px;'>
                             </a>
<?php
             }
?>
            <?php echo $this->Ini->Nm_lang['lang_othr_dynamicsearch_title'] ?>
        </td>
      </tr>
      <tr>
        <td class="scAppDivContent scAppDivContentText">
            <table id="table_dyn_search" cellspacing=2 cellpadding=4>
<?php
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search']))
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search'] as $IX => $def)
           {
               $cmp = $def['cmp'];
               if ($cmp == "tpi_codigo_")
               {
                   $this->Dyn_search_seq++;;
                   $this->Dyn_search_dat[$this->Dyn_search_seq] = "tpi_codigo_";
                   $lin_obj = $this->dynamic_search_tpi_codigo_($this->Dyn_search_seq, 'N', $def['opc'], $def['val']);
                   echo $lin_obj;
               }
               if ($cmp == "cla_codigo_")
               {
                   $this->Dyn_search_seq++;;
                   $this->Dyn_search_dat[$this->Dyn_search_seq] = "cla_codigo_";
                   $lin_obj = $this->dynamic_search_cla_codigo_($this->Dyn_search_seq, 'N', $def['opc'], $def['val']);
                   echo $lin_obj;
               }
               if ($cmp == "arc_codigo_")
               {
                   $this->Dyn_search_seq++;;
                   $this->Dyn_search_dat[$this->Dyn_search_seq] = "arc_codigo_";
                   $lin_obj = $this->dynamic_search_arc_codigo_($this->Dyn_search_seq, 'N', $def['opc'], $def['val']);
                   echo $lin_obj;
               }
           }
       }
?>
                </table>
<?php
?>
            </td>
        </tr>
    <tr>
        <td nowrap  class="scAppDivToolbar">
       <?php echo nmButtonOutput($this->arr_buttons, "bapply", "nm_show_dynamicsearch_fields(); return false;", "nm_show_dynamicsearch_fields(); return false;", "id_dyn_search_fields", "", "" . $this->Ini->Nm_lang['lang_othr_dynamicsearch_fields'] . "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>
      <table id='id_dynamic_search_fields' style='display:none; position: absolute; border-collapse: collapse; z-index: 1000;'> 
        <tr>
            <td class='scBtnGrpBackground'>
                <div class='scBtnGrpText' style='cursor: pointer;' onclick="ajax_add_dyn_search('tpi_codigo_', 'form')"><?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_label']['tpi_codigo_'] ?>
                </div>
            </td>
        </tr>
        <tr>
            <td class='scBtnGrpBackground'>
                <div class='scBtnGrpText' style='cursor: pointer;' onclick="ajax_add_dyn_search('cla_codigo_', 'form')"><?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_label']['cla_codigo_'] ?>
                </div>
            </td>
        </tr>
        <tr>
            <td class='scBtnGrpBackground'>
                <div class='scBtnGrpText' style='cursor: pointer;' onclick="ajax_add_dyn_search('arc_codigo_', 'form')"><?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_label']['arc_codigo_'] ?>
                </div>
            </td>
        </tr>
      </table> 
      &nbsp;&nbsp;&nbsp;
       <?php echo nmButtonOutput($this->arr_buttons, "blimpar", "nm_clear_dyn_search(); return false;", "nm_clear_dyn_search(); return false;", "dyn_search_clear", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>
       &nbsp;&nbsp;&nbsp;
       <?php echo nmButtonOutput($this->arr_buttons, "bapply", "setTimeout(function() {nm_proc_dyn_search('id_Fdyn_search', 'dyn_search')}, 200);", "setTimeout(function() {nm_proc_dyn_search('id_Fdyn_search', 'dyn_search')}, 200);", "dyn_search", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>
        </td>
    </tr>
    </table>
   </form>
   </div>
   </td>
<?php
       if ($this->NM_ajax_flag)
       { 
           $Temp = ob_get_clean();
           $this->NM_ajax_info['dyn_search']['NM_Dynamic_Search'] = NM_charset_to_utf8(trim($Temp));
           $this->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'] = NM_charset_to_utf8(trim($this->Dyn_search_str));
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_clear']))
           { 
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_clear']);
           } 
           return;
       } 
?>
   </tr>
<?php
       $this->JS_dynamic_search();
   }
   function dynamic_search_tpi_codigo_($ind, $ajax, $opc="", $val=array())
   {
       $lin_obj  = "";
       $lin_obj .= "     <tr id='dyn_search_tpi_codigo__" . $ind . "'>";
       $lin_obj .= "      <td style='border-style: none' nowrap>" . $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_label']['tpi_codigo_'] . "</td>";
       $lin_obj .= "      <td style='border-style: none' >";
       if (empty($opc))
       {
           $opc = "gt";
       }
       $lin_obj .= "       <select id='dyn_search_tpi_codigo__cond_" . $ind . "' name='cond_dyn_search_tpi_codigo__" . $ind . "' class='sc-js-input scAppDivToolbarInput' style='vertical-align: middle;' onChange='dyn_search_change_bw(\"tpi_codigo_\", $ind)' alt=\"{autoTab: false, enterTab: true}\">";
       $selected = ($opc == "gt") ? " selected" : "";
       $lin_obj .= "        <option value='gt'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_grtr'] . "</option>";
       $selected = ($opc == "lt") ? " selected" : "";
       $lin_obj .= "        <option value='lt'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_less'] . "</option>";
       $selected = ($opc == "eq") ? " selected" : "";
       $lin_obj .= "        <option value='eq'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_exac'] . "</option>";
       $selected = ($opc == "bw") ? " selected" : "";
       $lin_obj .= "        <option value='bw'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_betw'] . "</option>";
       $lin_obj .= "       </select>";
       $lin_obj .= "      </td>";
       $lin_obj .= "      <td style='border-style: none' >";
       if ($opc == "nu" || $opc == "nn" || $opc == "ep" || $opc == "ne")
       {
           $display_in_1 = "none";
       }
       else
       {
           $display_in_1 = "''";
       }
       $lin_obj .= "       <span id=\"dyn_tpi_codigo__" . $ind . "\" style=\"display:" . $display_in_1 . "\">";
       $val_cmp = (isset($val[0][0])) ? $val[0][0] : "";
       $tpi_codigo_ = $val_cmp;
       $nmgp_def_dados = array(); 
    if (is_numeric($tpi_codigo_))
    { 
       $nm_comando = "select distinct tpi_codigo from " . $this->Ini->nm_tabela . " where tpi_codigo = $tpi_codigo_"; 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rs = $this->Db->Execute($nm_comando)) 
       { 
          while (!$rs->EOF) 
          { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext(); 
          } 
          $rs->Close(); 
       } 
       else  
       {  
           if  ($ajax == 'N')
           {  
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit; 
           } 
           else
           {  
              echo $this->Db->ErrorMsg(); 
           } 
       } 
    } 
       if (isset($nmgp_def_dados[0][$tpi_codigo_]))
       {
           $sAutocompValue = $nmgp_def_dados[0][$tpi_codigo_];
       }
       else
       {
           $sAutocompValue = $val_cmp;
           $val[0][0]      = $val_cmp;
       }
       $val_cmp = (isset($val[0][0])) ? $val[0][0] : "";
       $lin_obj .= "     <input  type=\"text\" class='sc-js-input scAppDivToolbarInput' id='dyn_search_tpi_codigo__val_" . $ind . "' name='val_dyn_search_tpi_codigo__" . $ind . "' value=\"" . $this->form_encode_input($val_cmp) . "\" size=11 alt=\"{datatype: 'text', maxLength: 11, allowedChars: '0123456789" . $_SESSION['scriptcase']['reg_conf']['dec_num']  . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', lettersCase: '', enterTab: true}\" style='display: none'>";
       $lin_obj .= "     <input class='sc-js-input scAppDivToolbarInput' type='text' id='id_ac_tpi_codigo_" . $ind . "' name='tpi_codigo__autocomp" . $ind . "' size='11' value='" . $this->form_encode_input($sAutocompValue) . "' alt=\"{datatype: 'text', maxLength: 11, allowedChars: '0123456789" . $_SESSION['scriptcase']['reg_conf']['dec_num']  . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', lettersCase: '', enterTab: true}\">";
       $lin_obj .= "       </span>";
       if ($opc == "bw")
       {
           $display_in_2 = "''";
       }
       else
       {
           $display_in_2 = "none";
       }
       $lin_obj .= "       <span id=\"dyn_tpi_codigo__in_2_" . $ind . "\" style=\"display:" . $display_in_2 . "\">";
       $lin_obj .= "       <br>";
       $val_cmp = (isset($val[1][0])) ? $val[1][0] : "";
       $tpi_codigo__v2_ = $val_cmp;
       $nmgp_def_dados = array(); 
    if (is_numeric($tpi_codigo__v2_))
    { 
       $nm_comando = "select distinct tpi_codigo from " . $this->Ini->nm_tabela . " where tpi_codigo = $tpi_codigo__v2_"; 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rs = $this->Db->Execute($nm_comando)) 
       { 
          while (!$rs->EOF) 
          { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext(); 
          } 
          $rs->Close(); 
       } 
       else  
       {  
           if  ($ajax == 'N')
           {  
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit; 
           } 
           else
           {  
              echo $this->Db->ErrorMsg(); 
           } 
       } 
    } 
       if (isset($nmgp_def_dados[0][$tpi_codigo__v2_]))
       {
           $sAutocompValue = $nmgp_def_dados[0][$tpi_codigo__v2_];
       }
       else
       {
           $sAutocompValue = $val_cmp;
           $val[1][0]      = $val_cmp;
       }
       $val_cmp = (isset($val[1][0])) ? $val[1][0] : "";
       $lin_obj .= "     <input  type=\"text\" class='sc-js-input scAppDivToolbarInput' id='dyn_search_tpi_codigo__v2__val_" . $ind . "' name='val_dyn_search_tpi_codigo__v2__" . $ind . "' value=\"" . $this->form_encode_input($val_cmp) . "\" size=11 alt=\"{datatype: 'text', maxLength: 11, allowedChars: '0123456789" . $_SESSION['scriptcase']['reg_conf']['dec_num']  . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', lettersCase: '', enterTab: true}\" style='display: none'>";
       $lin_obj .= "     <input class='sc-js-input scAppDivToolbarInput' type='text' id='id_ac_tpi_codigo__v2_" . $ind . "' name='tpi_codigo__v2__autocomp" . $ind . "' size='11' value='" . $this->form_encode_input($sAutocompValue) . "' alt=\"{datatype: 'text', maxLength: 11, allowedChars: '0123456789" . $_SESSION['scriptcase']['reg_conf']['dec_num']  . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', lettersCase: '', enterTab: true}\">";
       $lin_obj .= "       </span>";
       $lin_obj .= "      </td>";
       $lin_obj .= "      <td style='border-style: none' >";
       $lin_obj .= "       <img id='dyn_search_tpi_codigo__close_" . $ind . "' src='" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "' onclick=\"del_dyn_search('dyn_search_tpi_codigo__" . $ind . "', " . $ind . ");\">";
       $lin_obj .= "      </td>";
       $lin_obj .= "     </tr>";
       return $lin_obj;
   }
   function dynamic_search_cla_codigo_($ind, $ajax, $opc="", $val=array())
   {
       $lin_obj  = "";
       $lin_obj .= "     <tr id='dyn_search_cla_codigo__" . $ind . "'>";
       $lin_obj .= "      <td style='border-style: none' nowrap>" . $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_label']['cla_codigo_'] . "</td>";
       $lin_obj .= "      <td style='border-style: none' >";
       if (empty($opc))
       {
           $opc = "gt";
       }
       $lin_obj .= "       <select id='dyn_search_cla_codigo__cond_" . $ind . "' name='cond_dyn_search_cla_codigo__" . $ind . "' class='sc-js-input scAppDivToolbarInput' style='vertical-align: middle;' onChange='dyn_search_change_bw(\"cla_codigo_\", $ind)' alt=\"{autoTab: false, enterTab: true}\">";
       $selected = ($opc == "gt") ? " selected" : "";
       $lin_obj .= "        <option value='gt'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_grtr'] . "</option>";
       $selected = ($opc == "lt") ? " selected" : "";
       $lin_obj .= "        <option value='lt'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_less'] . "</option>";
       $selected = ($opc == "eq") ? " selected" : "";
       $lin_obj .= "        <option value='eq'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_exac'] . "</option>";
       $selected = ($opc == "bw") ? " selected" : "";
       $lin_obj .= "        <option value='bw'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_betw'] . "</option>";
       $lin_obj .= "       </select>";
       $lin_obj .= "      </td>";
       $lin_obj .= "      <td style='border-style: none' >";
       if ($opc == "nu" || $opc == "nn" || $opc == "ep" || $opc == "ne")
       {
           $display_in_1 = "none";
       }
       else
       {
           $display_in_1 = "''";
       }
       $lin_obj .= "       <span id=\"dyn_cla_codigo__" . $ind . "\" style=\"display:" . $display_in_1 . "\">";
       $val_cmp = (isset($val[0][0])) ? $val[0][0] : "";
       $cla_codigo_ = $val_cmp;
       $nmgp_def_dados = array(); 
    if (is_numeric($cla_codigo_))
    { 
       $nm_comando = "select distinct cla_codigo from " . $this->Ini->nm_tabela . " where cla_codigo = $cla_codigo_"; 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rs = $this->Db->Execute($nm_comando)) 
       { 
          while (!$rs->EOF) 
          { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext(); 
          } 
          $rs->Close(); 
       } 
       else  
       {  
           if  ($ajax == 'N')
           {  
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit; 
           } 
           else
           {  
              echo $this->Db->ErrorMsg(); 
           } 
       } 
    } 
       if (isset($nmgp_def_dados[0][$cla_codigo_]))
       {
           $sAutocompValue = $nmgp_def_dados[0][$cla_codigo_];
       }
       else
       {
           $sAutocompValue = $val_cmp;
           $val[0][0]      = $val_cmp;
       }
       $val_cmp = (isset($val[0][0])) ? $val[0][0] : "";
       $lin_obj .= "     <input  type=\"text\" class='sc-js-input scAppDivToolbarInput' id='dyn_search_cla_codigo__val_" . $ind . "' name='val_dyn_search_cla_codigo__" . $ind . "' value=\"" . $this->form_encode_input($val_cmp) . "\" size=11 alt=\"{datatype: 'text', maxLength: 11, allowedChars: '0123456789" . $_SESSION['scriptcase']['reg_conf']['dec_num']  . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', lettersCase: '', enterTab: true}\" style='display: none'>";
       $lin_obj .= "     <input class='sc-js-input scAppDivToolbarInput' type='text' id='id_ac_cla_codigo_" . $ind . "' name='cla_codigo__autocomp" . $ind . "' size='11' value='" . $this->form_encode_input($sAutocompValue) . "' alt=\"{datatype: 'text', maxLength: 11, allowedChars: '0123456789" . $_SESSION['scriptcase']['reg_conf']['dec_num']  . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', lettersCase: '', enterTab: true}\">";
       $lin_obj .= "       </span>";
       if ($opc == "bw")
       {
           $display_in_2 = "''";
       }
       else
       {
           $display_in_2 = "none";
       }
       $lin_obj .= "       <span id=\"dyn_cla_codigo__in_2_" . $ind . "\" style=\"display:" . $display_in_2 . "\">";
       $lin_obj .= "       <br>";
       $val_cmp = (isset($val[1][0])) ? $val[1][0] : "";
       $cla_codigo__v2_ = $val_cmp;
       $nmgp_def_dados = array(); 
    if (is_numeric($cla_codigo__v2_))
    { 
       $nm_comando = "select distinct cla_codigo from " . $this->Ini->nm_tabela . " where cla_codigo = $cla_codigo__v2_"; 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rs = $this->Db->Execute($nm_comando)) 
       { 
          while (!$rs->EOF) 
          { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext(); 
          } 
          $rs->Close(); 
       } 
       else  
       {  
           if  ($ajax == 'N')
           {  
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit; 
           } 
           else
           {  
              echo $this->Db->ErrorMsg(); 
           } 
       } 
    } 
       if (isset($nmgp_def_dados[0][$cla_codigo__v2_]))
       {
           $sAutocompValue = $nmgp_def_dados[0][$cla_codigo__v2_];
       }
       else
       {
           $sAutocompValue = $val_cmp;
           $val[1][0]      = $val_cmp;
       }
       $val_cmp = (isset($val[1][0])) ? $val[1][0] : "";
       $lin_obj .= "     <input  type=\"text\" class='sc-js-input scAppDivToolbarInput' id='dyn_search_cla_codigo__v2__val_" . $ind . "' name='val_dyn_search_cla_codigo__v2__" . $ind . "' value=\"" . $this->form_encode_input($val_cmp) . "\" size=11 alt=\"{datatype: 'text', maxLength: 11, allowedChars: '0123456789" . $_SESSION['scriptcase']['reg_conf']['dec_num']  . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', lettersCase: '', enterTab: true}\" style='display: none'>";
       $lin_obj .= "     <input class='sc-js-input scAppDivToolbarInput' type='text' id='id_ac_cla_codigo__v2_" . $ind . "' name='cla_codigo__v2__autocomp" . $ind . "' size='11' value='" . $this->form_encode_input($sAutocompValue) . "' alt=\"{datatype: 'text', maxLength: 11, allowedChars: '0123456789" . $_SESSION['scriptcase']['reg_conf']['dec_num']  . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', lettersCase: '', enterTab: true}\">";
       $lin_obj .= "       </span>";
       $lin_obj .= "      </td>";
       $lin_obj .= "      <td style='border-style: none' >";
       $lin_obj .= "       <img id='dyn_search_cla_codigo__close_" . $ind . "' src='" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "' onclick=\"del_dyn_search('dyn_search_cla_codigo__" . $ind . "', " . $ind . ");\">";
       $lin_obj .= "      </td>";
       $lin_obj .= "     </tr>";
       return $lin_obj;
   }
   function dynamic_search_arc_codigo_($ind, $ajax, $opc="", $val=array())
   {
       $lin_obj  = "";
       $lin_obj .= "     <tr id='dyn_search_arc_codigo__" . $ind . "'>";
       $lin_obj .= "      <td style='border-style: none' nowrap>" . $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_label']['arc_codigo_'] . "</td>";
       $lin_obj .= "      <td style='border-style: none' >";
       if (empty($opc))
       {
           $opc = "gt";
       }
       $lin_obj .= "       <select id='dyn_search_arc_codigo__cond_" . $ind . "' name='cond_dyn_search_arc_codigo__" . $ind . "' class='sc-js-input scAppDivToolbarInput' style='vertical-align: middle;' onChange='dyn_search_change_bw(\"arc_codigo_\", $ind)' alt=\"{autoTab: false, enterTab: true}\">";
       $selected = ($opc == "gt") ? " selected" : "";
       $lin_obj .= "        <option value='gt'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_grtr'] . "</option>";
       $selected = ($opc == "lt") ? " selected" : "";
       $lin_obj .= "        <option value='lt'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_less'] . "</option>";
       $selected = ($opc == "eq") ? " selected" : "";
       $lin_obj .= "        <option value='eq'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_exac'] . "</option>";
       $selected = ($opc == "bw") ? " selected" : "";
       $lin_obj .= "        <option value='bw'" . $selected . ">" . $this->Ini->Nm_lang['lang_srch_betw'] . "</option>";
       $lin_obj .= "       </select>";
       $lin_obj .= "      </td>";
       $lin_obj .= "      <td style='border-style: none' >";
       if ($opc == "nu" || $opc == "nn" || $opc == "ep" || $opc == "ne")
       {
           $display_in_1 = "none";
       }
       else
       {
           $display_in_1 = "''";
       }
       $lin_obj .= "       <span id=\"dyn_arc_codigo__" . $ind . "\" style=\"display:" . $display_in_1 . "\">";
       $val_cmp = (isset($val[0][0])) ? $val[0][0] : "";
       $arc_codigo_ = $val_cmp;
       $nmgp_def_dados = array(); 
    if (is_numeric($arc_codigo_))
    { 
       $nm_comando = "select distinct arc_codigo from " . $this->Ini->nm_tabela . " where arc_codigo = $arc_codigo_"; 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rs = $this->Db->Execute($nm_comando)) 
       { 
          while (!$rs->EOF) 
          { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext(); 
          } 
          $rs->Close(); 
       } 
       else  
       {  
           if  ($ajax == 'N')
           {  
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit; 
           } 
           else
           {  
              echo $this->Db->ErrorMsg(); 
           } 
       } 
    } 
       if (isset($nmgp_def_dados[0][$arc_codigo_]))
       {
           $sAutocompValue = $nmgp_def_dados[0][$arc_codigo_];
       }
       else
       {
           $sAutocompValue = $val_cmp;
           $val[0][0]      = $val_cmp;
       }
       $val_cmp = (isset($val[0][0])) ? $val[0][0] : "";
       $lin_obj .= "     <input  type=\"text\" class='sc-js-input scAppDivToolbarInput' id='dyn_search_arc_codigo__val_" . $ind . "' name='val_dyn_search_arc_codigo__" . $ind . "' value=\"" . $this->form_encode_input($val_cmp) . "\" size=11 alt=\"{datatype: 'text', maxLength: 11, allowedChars: '0123456789" . $_SESSION['scriptcase']['reg_conf']['dec_num']  . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', lettersCase: '', enterTab: true}\" style='display: none'>";
       $lin_obj .= "     <input class='sc-js-input scAppDivToolbarInput' type='text' id='id_ac_arc_codigo_" . $ind . "' name='arc_codigo__autocomp" . $ind . "' size='11' value='" . $this->form_encode_input($sAutocompValue) . "' alt=\"{datatype: 'text', maxLength: 11, allowedChars: '0123456789" . $_SESSION['scriptcase']['reg_conf']['dec_num']  . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', lettersCase: '', enterTab: true}\">";
       $lin_obj .= "       </span>";
       if ($opc == "bw")
       {
           $display_in_2 = "''";
       }
       else
       {
           $display_in_2 = "none";
       }
       $lin_obj .= "       <span id=\"dyn_arc_codigo__in_2_" . $ind . "\" style=\"display:" . $display_in_2 . "\">";
       $lin_obj .= "       <br>";
       $val_cmp = (isset($val[1][0])) ? $val[1][0] : "";
       $arc_codigo__v2_ = $val_cmp;
       $nmgp_def_dados = array(); 
    if (is_numeric($arc_codigo__v2_))
    { 
       $nm_comando = "select distinct arc_codigo from " . $this->Ini->nm_tabela . " where arc_codigo = $arc_codigo__v2_"; 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rs = $this->Db->Execute($nm_comando)) 
       { 
          while (!$rs->EOF) 
          { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext(); 
          } 
          $rs->Close(); 
       } 
       else  
       {  
           if  ($ajax == 'N')
           {  
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit; 
           } 
           else
           {  
              echo $this->Db->ErrorMsg(); 
           } 
       } 
    } 
       if (isset($nmgp_def_dados[0][$arc_codigo__v2_]))
       {
           $sAutocompValue = $nmgp_def_dados[0][$arc_codigo__v2_];
       }
       else
       {
           $sAutocompValue = $val_cmp;
           $val[1][0]      = $val_cmp;
       }
       $val_cmp = (isset($val[1][0])) ? $val[1][0] : "";
       $lin_obj .= "     <input  type=\"text\" class='sc-js-input scAppDivToolbarInput' id='dyn_search_arc_codigo__v2__val_" . $ind . "' name='val_dyn_search_arc_codigo__v2__" . $ind . "' value=\"" . $this->form_encode_input($val_cmp) . "\" size=11 alt=\"{datatype: 'text', maxLength: 11, allowedChars: '0123456789" . $_SESSION['scriptcase']['reg_conf']['dec_num']  . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', lettersCase: '', enterTab: true}\" style='display: none'>";
       $lin_obj .= "     <input class='sc-js-input scAppDivToolbarInput' type='text' id='id_ac_arc_codigo__v2_" . $ind . "' name='arc_codigo__v2__autocomp" . $ind . "' size='11' value='" . $this->form_encode_input($sAutocompValue) . "' alt=\"{datatype: 'text', maxLength: 11, allowedChars: '0123456789" . $_SESSION['scriptcase']['reg_conf']['dec_num']  . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', lettersCase: '', enterTab: true}\">";
       $lin_obj .= "       </span>";
       $lin_obj .= "      </td>";
       $lin_obj .= "      <td style='border-style: none' >";
       $lin_obj .= "       <img id='dyn_search_arc_codigo__close_" . $ind . "' src='" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "' onclick=\"del_dyn_search('dyn_search_arc_codigo__" . $ind . "', " . $ind . ");\">";
       $lin_obj .= "      </td>";
       $lin_obj .= "     </tr>";
       return $lin_obj;
   }
   function lookup_ajax_tpi_codigo_($tpi_codigo_)
   {
       $tpi_codigo_ = substr($this->Db->qstr($tpi_codigo_), 1, -1);
       $nmgp_def_dados = array(); 
       $nm_comando = "select distinct tpi_codigo from " . $this->Ini->nm_tabela . " where  tpi_codigo like '%" . $tpi_codigo_ . "%'"; 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rs = $this->Db->Execute($nm_comando)) 
       { 
          while (!$rs->EOF) 
          { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $cmp1 = $this->archivos_pack_protect_string($cmp1);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext(); 
          } 
          $rs->Close(); 
          return $nmgp_def_dados; 
       } 
       else  
       {  
          echo $this->Db->ErrorMsg(); 
       } 
   }
   function lookup_ajax_cla_codigo_($cla_codigo_)
   {
       $cla_codigo_ = substr($this->Db->qstr($cla_codigo_), 1, -1);
       $nmgp_def_dados = array(); 
       $nm_comando = "select distinct cla_codigo from " . $this->Ini->nm_tabela . " where  cla_codigo like '%" . $cla_codigo_ . "%'"; 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rs = $this->Db->Execute($nm_comando)) 
       { 
          while (!$rs->EOF) 
          { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $cmp1 = $this->archivos_pack_protect_string($cmp1);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext(); 
          } 
          $rs->Close(); 
          return $nmgp_def_dados; 
       } 
       else  
       {  
          echo $this->Db->ErrorMsg(); 
       } 
   }
   function lookup_ajax_arc_codigo_($arc_codigo_)
   {
       $arc_codigo_ = substr($this->Db->qstr($arc_codigo_), 1, -1);
       $nmgp_def_dados = array(); 
       $nm_comando = "select distinct arc_codigo from " . $this->Ini->nm_tabela . " where  arc_codigo like '%" . $arc_codigo_ . "%'"; 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rs = $this->Db->Execute($nm_comando)) 
       { 
          while (!$rs->EOF) 
          { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $cmp1 = $this->archivos_pack_protect_string($cmp1);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext(); 
          } 
          $rs->Close(); 
          return $nmgp_def_dados; 
       } 
       else  
       {  
          echo $this->Db->ErrorMsg(); 
       } 
   }
   function archivos_pack_protect_string($sString)
   {
      $sString = (string) $sString;
      if (!empty($sString))
      {
         if (function_exists('NM_is_utf8') && NM_is_utf8($sString))
         {
             return $sString;
         }
         else
         {
             return sc_htmlentities($sString);
         }
      }
      elseif ('0' === $sString || 0 === $sString)
      {
         return '0';
      }
      else
      {
         return '';
      }
   }
   function JS_dynamic_search()
   {
       global $nm_saida;
?>
   <script type="text/javascript">
     var Tot_obj_dyn_search = <?php echo $this->Dyn_search_seq ?>;
     Tab_obj_dyn_search = new Array();
     Tab_evt_dyn_search = new Array();
<?php
       foreach ($this->Dyn_search_dat as $seq => $cmp)
       {
?>
     Tab_obj_dyn_search[<?php echo $seq ?>] = '<?php echo $cmp ?>';
<?php
       }
?>
<?php
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['ajax_nav'])
   { 
       $this->Ini->Arr_result['setArr'][] = array('var' => 'Tab_obj_dyn_search', 'value' => '');
       $this->Ini->Arr_result['setArr'][] = array('var' => 'Tab_evt_dyn_search', 'value' => '');
       $this->Ini->Arr_result['setVar'][] = array('var' => 'Tot_obj_dyn_search', 'value' => $this->Dyn_search_seq);
       foreach ($this->Dyn_search_dat as $seq => $cmp)
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'Tab_obj_dyn_search[' . $seq . ']', 'value' => $cmp);
       }
   } 
?>
     function SC_carga_evt_jquery(tp_carga)
     {
         for (i = 1; i <= Tot_obj_dyn_search; i++)
         {
             if (Tab_obj_dyn_search[i] != 'NMSC_Dyn_Null' && (tp_carga == 'all' || tp_carga == i))
             {
                 x   = 0;
                 tmp = Tab_obj_dyn_search[i];
                 cps = new Array();
                 cps[x] = tmp;
                 for (x = 0; x < cps.length ; x++)
                 {
                     cmp = cps[x];
                     if (Tab_evt_dyn_search[cmp])
                     {
                         eval ("$('#dyn_search_" + cmp + "_val_" + i + "').bind('change', function() {" + Tab_evt_dyn_search[cmp] + "})");
                     }
                 }
             }
         }
         for (i = 1; i <= Tot_obj_dyn_search; i++)
         {
             if (Tab_obj_dyn_search[i] != 'NMSC_Dyn_Null' && (tp_carga == 'all' || tp_carga == i))
             {
                 tmp = Tab_obj_dyn_search[i];
                 if (tmp == 'tpi_codigo_')
                 {
                      var x = i;
                      $("#id_ac_tpi_codigo_" + i).autocomplete({
                        source: function (request, response) {
                        $.ajax({
                          url: "index.php",
                          dataType: "json",
                          data: {
                             q: request.term,
                             nmgp_opcao: "ajax_aut_comp_dyn_search",
                             origem: "form",
                             field: "tpi_codigo_",
                             max_itens: "10",
                             cod_desc: "N",
                             script_case_init: <?php echo $this->Ini->sc_page ?>
                           },
                          success: function (data) {
                            response(data);
                          }
                         });
                        },
                        select: function (event, ui) {
                          $("#dyn_search_tpi_codigo__val_" + x).val(ui.item.value);
                          $(this).val(ui.item.label);
                          event.preventDefault();
                        },
                        change: function (event, ui) {
                          if (null == ui.item) {
                             $("#dyn_search_tpi_codigo__val_" + x).val( $(this).val() );
                          }
                        }
                      });
                      var x = i;
                      $("#id_ac_tpi_codigo__v2_" + i).autocomplete({
                        source: function (request, response) {
                        $.ajax({
                          url: "index.php",
                          dataType: "json",
                          data: {
                             q: request.term,
                             nmgp_opcao: "ajax_aut_comp_dyn_search",
                             origem: "form",
                             field: "tpi_codigo_",
                             max_itens: "10",
                             cod_desc: "N",
                             script_case_init: <?php echo $this->Ini->sc_page ?>
                           },
                          success: function (data) {
                            response(data);
                          }
                         });
                        },
                        select: function (event, ui) {
                          $("#dyn_search_tpi_codigo__v2__val_" + x).val(ui.item.value);
                          $(this).val(ui.item.label);
                          event.preventDefault();
                        },
                        change: function (event, ui) {
                          if (null == ui.item) {
                             $("#dyn_search_tpi_codigo__v2__val_" + x).val( $(this).val() );
                          }
                        }
                      });
                 }
                 if (tmp == 'cla_codigo_')
                 {
                      var x = i;
                      $("#id_ac_cla_codigo_" + i).autocomplete({
                        source: function (request, response) {
                        $.ajax({
                          url: "index.php",
                          dataType: "json",
                          data: {
                             q: request.term,
                             nmgp_opcao: "ajax_aut_comp_dyn_search",
                             origem: "form",
                             field: "cla_codigo_",
                             max_itens: "10",
                             cod_desc: "N",
                             script_case_init: <?php echo $this->Ini->sc_page ?>
                           },
                          success: function (data) {
                            response(data);
                          }
                         });
                        },
                        select: function (event, ui) {
                          $("#dyn_search_cla_codigo__val_" + x).val(ui.item.value);
                          $(this).val(ui.item.label);
                          event.preventDefault();
                        },
                        change: function (event, ui) {
                          if (null == ui.item) {
                             $("#dyn_search_cla_codigo__val_" + x).val( $(this).val() );
                          }
                        }
                      });
                      var x = i;
                      $("#id_ac_cla_codigo__v2_" + i).autocomplete({
                        source: function (request, response) {
                        $.ajax({
                          url: "index.php",
                          dataType: "json",
                          data: {
                             q: request.term,
                             nmgp_opcao: "ajax_aut_comp_dyn_search",
                             origem: "form",
                             field: "cla_codigo_",
                             max_itens: "10",
                             cod_desc: "N",
                             script_case_init: <?php echo $this->Ini->sc_page ?>
                           },
                          success: function (data) {
                            response(data);
                          }
                         });
                        },
                        select: function (event, ui) {
                          $("#dyn_search_cla_codigo__v2__val_" + x).val(ui.item.value);
                          $(this).val(ui.item.label);
                          event.preventDefault();
                        },
                        change: function (event, ui) {
                          if (null == ui.item) {
                             $("#dyn_search_cla_codigo__v2__val_" + x).val( $(this).val() );
                          }
                        }
                      });
                 }
                 if (tmp == 'arc_codigo_')
                 {
                      var x = i;
                      $("#id_ac_arc_codigo_" + i).autocomplete({
                        source: function (request, response) {
                        $.ajax({
                          url: "index.php",
                          dataType: "json",
                          data: {
                             q: request.term,
                             nmgp_opcao: "ajax_aut_comp_dyn_search",
                             origem: "form",
                             field: "arc_codigo_",
                             max_itens: "10",
                             cod_desc: "N",
                             script_case_init: <?php echo $this->Ini->sc_page ?>
                           },
                          success: function (data) {
                            response(data);
                          }
                         });
                        },
                        select: function (event, ui) {
                          $("#dyn_search_arc_codigo__val_" + x).val(ui.item.value);
                          $(this).val(ui.item.label);
                          event.preventDefault();
                        },
                        change: function (event, ui) {
                          if (null == ui.item) {
                             $("#dyn_search_arc_codigo__val_" + x).val( $(this).val() );
                          }
                        }
                      });
                      var x = i;
                      $("#id_ac_arc_codigo__v2_" + i).autocomplete({
                        source: function (request, response) {
                        $.ajax({
                          url: "index.php",
                          dataType: "json",
                          data: {
                             q: request.term,
                             nmgp_opcao: "ajax_aut_comp_dyn_search",
                             origem: "form",
                             field: "arc_codigo_",
                             max_itens: "10",
                             cod_desc: "N",
                             script_case_init: <?php echo $this->Ini->sc_page ?>
                           },
                          success: function (data) {
                            response(data);
                          }
                         });
                        },
                        select: function (event, ui) {
                          $("#dyn_search_arc_codigo__v2__val_" + x).val(ui.item.value);
                          $(this).val(ui.item.label);
                          event.preventDefault();
                        },
                        change: function (event, ui) {
                          if (null == ui.item) {
                             $("#dyn_search_arc_codigo__v2__val_" + x).val( $(this).val() );
                          }
                        }
                      });
                 }
             }
         }
     }
     function del_dyn_search(field, ind)
     {
         Tab_obj_dyn_search[ind] = 'NMSC_Dyn_Null';
         $('#' + field).remove();
     }
     function dyn_search_change_bw(field, ind)
     {
        var index = document.getElementById('dyn_search_' + field + '_cond_' + ind).selectedIndex;
        var parm  = document.getElementById('dyn_search_' + field + '_cond_' + ind).options[index].value;
        if (parm == "bw")
        {
            $('#dyn_' + field + '_' + ind).css('display','');
            $('#dyn_' + field + '_in_2_' + ind).css('display','');
        }
        else
        {
            $('#dyn_' + field + '_in_2_' + ind).css('display','none');
            if (parm == "nu" || parm == "nn" || parm == "ep" || parm == "ne")
            {
                $('#dyn_' + field + '_' + ind).css('display','none');
            }
            else
            {
                $('#dyn_' + field + '_' + ind).css('display','');
            }
        }
     }
     function dyn_search_hide_input(field, ind)
     {
        var index = document.getElementById('dyn_search_' + field + '_cond_' + ind).selectedIndex;
        var parm  = document.getElementById('dyn_search_' + field + '_cond_' + ind).options[index].value;
        if (parm == "nu" || parm == "nn" || parm == "ep" || parm == "ne")
        {
            $('#dyn_' + field + '_' + ind).css('display','none');
        }
        else
        {
            $('#dyn_' + field + '_' + ind).css('display','');
        }
     }
     var dynamicsearch_status = 'out';
     function nm_show_dynamicsearch_fields()
     {
       var btn_id = 'id_dyn_search_fields';
       var obj_id = 'id_dynamic_search_fields';
       dynamicsearch_status = 'open';
       $('#' + btn_id).mouseout(function() {
         setTimeout(function() {
           nm_hide_dynamicsearch_fields(obj_id);
         }, 1000);
       });
       $('#' + obj_id + ' li').click(function() {
         dynamicsearch_status = 'out';
         nm_hide_dynamicsearch_fields(obj_id);
       });
       $('#' + obj_id).css({
         'left': $('#' + btn_id).left
       })
       .mouseover(function() {
         dynamicsearch_status = 'over';
       })
       .mouseleave(function() {
         dynamicsearch_status = 'out';
         setTimeout(function() {
           nm_hide_dynamicsearch_fields(obj_id);
         }, 1000);
       })
       .show('fast');
     }
   function nm_hide_dynamicsearch_fields(obj_id) {
     if ('over' != dynamicsearch_status) {
       $('#' + obj_id).hide('fast');
     }
   }
     function nm_clear_dyn_search()
     {
         Tot_obj_dyn_search = 0;
         Tab_obj_dyn_search = new Array();
         nm_proc_dyn_search('id_Fdyn_search', 'dyn_search_clear');
     }
     function nm_proc_dyn_search(formId, Tp_Proc)
     {
         var out_dyn = "";
         for (i = 1; i <= Tot_obj_dyn_search; i++)
         {
             if (Tab_obj_dyn_search[i] != 'NMSC_Dyn_Null')
             {
                 out_dyn += (out_dyn != "") ? "_FDYN_" : "";
                 out_dyn += Tab_obj_dyn_search[i];
                 obj_dyn = 'dyn_search_' + Tab_obj_dyn_search[i] + '_cond_' + i;
                 out_dyn += "_DYN_" + dyn_search_get_sel_cond(obj_dyn);
                 obj_dyn = 'dyn_search_' + Tab_obj_dyn_search[i] + '_val_';

                 if (Tab_obj_dyn_search[i] == 'tpi_codigo_')
                 {
                     obj_ac  = 'id_ac_' + Tab_obj_dyn_search[i] + i;
                     result  = dyn_search_get_text(obj_dyn + i, obj_ac);
                     obj_ac  = 'id_ac_' + Tab_obj_dyn_search[i] + "_v2_" + i;
                     result += "_VLS2_" + dyn_search_get_text(obj_dyn + i + "_v2_", obj_ac);
                 }
                 if (Tab_obj_dyn_search[i] == 'cla_codigo_')
                 {
                     obj_ac  = 'id_ac_' + Tab_obj_dyn_search[i] + i;
                     result  = dyn_search_get_text(obj_dyn + i, obj_ac);
                     obj_ac  = 'id_ac_' + Tab_obj_dyn_search[i] + "_v2_" + i;
                     result += "_VLS2_" + dyn_search_get_text(obj_dyn + i + "_v2_", obj_ac);
                 }
                 if (Tab_obj_dyn_search[i] == 'arc_codigo_')
                 {
                     obj_ac  = 'id_ac_' + Tab_obj_dyn_search[i] + i;
                     result  = dyn_search_get_text(obj_dyn + i, obj_ac);
                     obj_ac  = 'id_ac_' + Tab_obj_dyn_search[i] + "_v2_" + i;
                     result += "_VLS2_" + dyn_search_get_text(obj_dyn + i + "_v2_", obj_ac);
                 }
                 out_dyn += "_DYN_" + result;
             }
         }
         if (out_dyn == "" && Tp_Proc != "dyn_search_clear")
         {
             return;
         }
         nm_move(Tp_Proc, out_dyn);
     }
     function dyn_search_get_sel_cond(obj_id)
     {
        var index = document.getElementById(obj_id).selectedIndex;
        return document.getElementById(obj_id).options[index].value;
     }
     function dyn_search_get_select(obj_id, str_type)
     {
        if(str_type == '')
        {
            var obj = document.getElementById(obj_id);
        }
        else
        {
            var obj = $('#' + obj_id).multipleSelect('getSelects');
        }
        var val = "";
        for (iSelect = 0; iSelect < obj.length; iSelect++)
        {
            if ((str_type == '' && obj[iSelect].selected) || (str_type=='RADIO' || str_type=='CHECKBOX'))
            {
                if(str_type == '' && obj[iSelect].selected)
                {
                    new_val = obj[iSelect].value;
                }
                else
                {
                    new_val = obj[iSelect];
                }
                val += (val != "") ? "_VLS_" : "";
                val += new_val;
            }
        }
        return val;
     }
     function dyn_search_get_Dselelect(obj_id)
     {
        var obj = document.getElementById(obj_id);
        var val = "";
        for (iSelect = 0; iSelect < obj.length; iSelect++)
        {
            val += (val != "") ? "_VLS_" : "";
            val += obj[iSelect].value;
        }
        return val;
     }
     function dyn_search_get_radio(obj_id)
     {
        var Nobj = document.getElementById(obj_id).name;
        var obj  = document.getElementsByName(Nobj);
        var val  = "";
        for (iRadio = 0; iRadio < obj.length; iRadio++)
        {
            if (obj[iRadio].checked)
            {
                val += (val != "") ? "_VLS_" : "";
                val += obj[iRadio].value;
            }
        }
        return val;
     }
     function dyn_search_get_checkbox(obj_id)
     {
        var Nobj = document.getElementById(obj_id).name;
        var obj  = document.getElementsByName(Nobj);
        var val  = "";
        if (!obj.length)
        {
            if (obj.checked)
            {
                val = obj.value;
            }
            return val;
        }
        else
        {
            for (iCheck = 0; iCheck < obj.length; iCheck++)
            {
                if (obj[iCheck].checked)
                {
                    val += (val != "") ? "_VLS_" : "";
                    val += obj[iCheck].value;
                }
            }
        }
        return val;
     }
     function dyn_search_get_text(obj_id, obj_ac)
     {
        var obj = document.getElementById(obj_id);
        var val = "";
        if (obj)
        {
            val = obj.value;
        }
        if (obj_ac != '' && val == '')
        {
            obj = document.getElementById(obj_ac);
            if (obj)
            {
                val = obj.value;
            }
        }
        return val;
     }
     function dyn_search_get_dt_h(obj_id, ind, TP)
     {
        var val = new Array();
        if (TP == 'DT' || TP == 'DH')
        {
            obj_part  = document.getElementById(obj_id + '_ano_val_' + ind);
            val      += "Y:";
            if (obj_part && obj_part.type.substr(0, 6) == 'select')
            {
                Tval = dyn_search_get_sel_cond(obj_id + '_ano_val_' + ind);
                val += (Tval != -1) ? Tval : '';
            }
            else
            {
                val += (obj_part) ? obj_part.value : '';
            }
            obj_part  = document.getElementById(obj_id + '_mes_val_' + ind);
            val      += "_VLS_M:";
            if (obj_part && obj_part.type.substr(0, 6) == 'select')
            {
                Tval = dyn_search_get_sel_cond(obj_id + '_mes_val_' + ind);
                val += (Tval != -1) ? Tval : '';
            }
            else
            {
                val += (obj_part) ? obj_part.value : '';
            }
            obj_part  = document.getElementById(obj_id + '_dia_val_' + ind);
            val      += "_VLS_D:";
            if (obj_part && obj_part.type.substr(0, 6) == 'select')
            {
                Tval = dyn_search_get_sel_cond(obj_id + '_dia_val_' + ind);
                val += (Tval != -1) ? Tval : '';
            }
            else
            {
                val += (obj_part) ? obj_part.value : '';
            }
        }
        if (TP == 'HH' || TP == 'DH')
        {
            val            += (val != "") ? "_VLS_" : "";
            obj_part        = document.getElementById(obj_id + '_hor_val_' + ind);
            val            += "H:";
            val            += (obj_part) ? obj_part.value : '';
            obj_part        = document.getElementById(obj_id + '_min_val_' + ind);
            val            += "_VLS_I:";
            val            += (obj_part) ? obj_part.value : '';
            obj_part        = document.getElementById(obj_id + '_seg_val_' + ind);
            val            += "_VLS_S:";
            val            += (obj_part) ? obj_part.value : '';
        }
        return val;
     }
function ajax_add_dyn_search(str_field, str_origem)
{
    var parm = str_field;
    if (parm == "")
    {
        return;
    }
    $('#table_dyn_search_criteria').show();
    scAjaxProcOn();
    Tot_obj_dyn_search++;
    Tab_obj_dyn_search[Tot_obj_dyn_search] = parm;
    $.ajax({
      type: "POST",
      url: "archivos.php",
      data: "nmgp_opcao=ajax_add_dyn_search&script_case_init=" + document.F1.script_case_init.value + "&script_case_session=" + document.F1.script_case_session.value + "&parm=" + parm + "&seq=" + Tot_obj_dyn_search + "&origem=" + str_origem,
      success: function(jsonDyn_add) {
        var i, oResp;
        Tst_integrid = jsonDyn_add.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            scAjaxProcOff();
            alert (jsonDyn_add);
            return;
        }
        eval("oResp = " + jsonDyn_add);
        if (oResp["dyn_add"]) {
          for (i = 0; i < oResp["dyn_add"].length; i++) {
               $('#table_dyn_search').append(oResp["dyn_add"][i]);
          }
        }
        if (oResp["htmOutput"]) {
           scAjaxShowDebug(oResp);
        }
        SC_carga_evt_jquery(Tot_obj_dyn_search);
        $('#dyn_search_' + parm + '_' + Tot_obj_dyn_search + ' input:text.sc-js-input').listen();
        $('#dyn_search_' + parm + '_' + Tot_obj_dyn_search + ' select.sc-js-input').listen();
        scAjaxProcOff();
      }
    });
}
   </script>
<?php
   }
   function SC_proc_dyn_search($Parms)
   {
       $ix     = 0;
       $fields = array();
       if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($Parms))
       {
           $Parms = NM_conv_charset($Parms, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $tmp    = explode("_FDYN_", $Parms);
       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_refresh'] = array();
       foreach ($tmp as $cada_f)
       {
           $dats = explode("_DYN_", $cada_f);
           $fields[$ix]['field']  = $dats[0];
           $fields[$ix]['cond']   = $dats[1];
           $sep_bw                 = explode("_VLS2_", $dats[2]);
           $fields[$ix]['vls'][0] = explode("_VLS_",  $sep_bw[0]);
           $fields[$ix]['vls'][1] = isset($sep_bw[1]) ? explode("_VLS_",  $sep_bw[1]) : "";
           $val_sv = array();
           foreach ($fields[$ix]['vls'] as $i => $dados)
           {
               if (is_array($dados))
               {
                   foreach ($dados as $ind => $str)
                   {
                       $str = NM_charset_decode($str);
                       $tmp_pos = strpos($str, "##@@");
                       if ($tmp_pos === false)
                       {
                          $val_sv[$i][] = $str;
                       }
                       else
                       {
                         $val_sv[$i][] = substr($str, 0, $tmp_pos);
                       }
                   }
               }
               else
               {
                   $dados = NM_charset_decode($dados);
                   $tmp_pos = strpos($dados, "##@@");
                   if ($tmp_pos === false)
                   {
                      $val_sv[$i] = $dados;
                   }
                   else
                   {
                      $val_sv[$i] = substr($dados, 0, $tmp_pos);
                   }
               }
           }
           $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search'][] = array('cmp' => $dats[0], 'opc' => $dats[1], 'val' => $val_sv);
           $ix++;
       }
       $this->Dyn_Serarch_and_or = "and";
       $this->Cmd_Dyn_Search    = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_dyn_search'] = "";
       foreach ($fields as $ind => $dados)
       {
           $this->Date_part          = false;
           $this->Operador_date_part = "";
           $this->Lang_date_part     = "";
           $dados['cond'] = strtoupper($dados['cond']);
           if (empty($dados['vls']) && ($dados['cond'] == "NU" || $dados['cond'] == "NN" || $dados['cond'] == "EP" || $dados['cond'] == "NE"))
           {
               $dados['vls'][0][0] = "";
           }
           if ($dados['field'] == "tpi_codigo_" && !empty($dados['vls']))
           {
               $Label_cmp     = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_label']['tpi_codigo_'];
               $dados['vls'][0] = $dados['vls'][0][0];
               if ($dados['cond'] == "BW")
               {
                   $dados['vls'][1] = $dados['vls'][1][0];
                   if (empty($dados['vls'][1]))
                   {
                       $dados['vls'][1] = $dados['vls'][0];
                   }
               }
               if ($dados['cond'] != "IN")
               {
                   $dados['vls'][0] = str_replace("", "", $dados['vls'][0]);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['decimal_db'] == ".")
                   {
                       $dados['vls'][0] = str_replace(",", ".", $dados['vls'][0]);
                   }
                   if ($dados['cond'] == "BW")
                   {
                       $dados['vls'][1] = str_replace("", "", $dados['vls'][1]);
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['decimal_db'] == ".")
                       {
                           $dados['vls'][1] = str_replace(",", ".", $dados['vls'][1]);
                       }
                   }
               }
               if ($dados['vls'][0] == "" || (!is_numeric($dados['vls'][0]) && $dados['cond'] != "IN"))
               {
                   $dados['vls'] = array();
               }
               if ($dados['cond'] == "BW" && ($dados['vls'][1] == "" || (!is_numeric($dados['vls'][1]) && $dados['cond'] != "IN")))
               {
                   $dados['vls'] = array();
               }
               $this->Val_format_1 = $dados['vls'][0];
               if ($dados['cond'] == "BW")
               {
                   $this->Val_format_2 = $dados['vls'][1];
                   $this->Val_BW_2     = $dados['vls'][1];
               }
               $this->SC_proc_dyn_search_all($dados['cond'], $dados['vls'], "tpi_codigo", 'N', 'INT', $Label_cmp);
           }
           if ($dados['field'] == "cla_codigo_" && !empty($dados['vls']))
           {
               $Label_cmp     = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_label']['cla_codigo_'];
               $dados['vls'][0] = $dados['vls'][0][0];
               if ($dados['cond'] == "BW")
               {
                   $dados['vls'][1] = $dados['vls'][1][0];
                   if (empty($dados['vls'][1]))
                   {
                       $dados['vls'][1] = $dados['vls'][0];
                   }
               }
               if ($dados['cond'] != "IN")
               {
                   $dados['vls'][0] = str_replace("", "", $dados['vls'][0]);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['decimal_db'] == ".")
                   {
                       $dados['vls'][0] = str_replace(",", ".", $dados['vls'][0]);
                   }
                   if ($dados['cond'] == "BW")
                   {
                       $dados['vls'][1] = str_replace("", "", $dados['vls'][1]);
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['decimal_db'] == ".")
                       {
                           $dados['vls'][1] = str_replace(",", ".", $dados['vls'][1]);
                       }
                   }
               }
               if ($dados['vls'][0] == "" || (!is_numeric($dados['vls'][0]) && $dados['cond'] != "IN"))
               {
                   $dados['vls'] = array();
               }
               if ($dados['cond'] == "BW" && ($dados['vls'][1] == "" || (!is_numeric($dados['vls'][1]) && $dados['cond'] != "IN")))
               {
                   $dados['vls'] = array();
               }
               $this->Val_format_1 = $dados['vls'][0];
               if ($dados['cond'] == "BW")
               {
                   $this->Val_format_2 = $dados['vls'][1];
                   $this->Val_BW_2     = $dados['vls'][1];
               }
               $this->SC_proc_dyn_search_all($dados['cond'], $dados['vls'], "cla_codigo", 'N', 'INT', $Label_cmp);
           }
           if ($dados['field'] == "arc_codigo_" && !empty($dados['vls']))
           {
               $Label_cmp     = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['dyn_search_label']['arc_codigo_'];
               $dados['vls'][0] = $dados['vls'][0][0];
               if ($dados['cond'] == "BW")
               {
                   $dados['vls'][1] = $dados['vls'][1][0];
                   if (empty($dados['vls'][1]))
                   {
                       $dados['vls'][1] = $dados['vls'][0];
                   }
               }
               if ($dados['cond'] != "IN")
               {
                   $dados['vls'][0] = str_replace("", "", $dados['vls'][0]);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['decimal_db'] == ".")
                   {
                       $dados['vls'][0] = str_replace(",", ".", $dados['vls'][0]);
                   }
                   if ($dados['cond'] == "BW")
                   {
                       $dados['vls'][1] = str_replace("", "", $dados['vls'][1]);
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['decimal_db'] == ".")
                       {
                           $dados['vls'][1] = str_replace(",", ".", $dados['vls'][1]);
                       }
                   }
               }
               if ($dados['vls'][0] == "" || (!is_numeric($dados['vls'][0]) && $dados['cond'] != "IN"))
               {
                   $dados['vls'] = array();
               }
               if ($dados['cond'] == "BW" && ($dados['vls'][1] == "" || (!is_numeric($dados['vls'][1]) && $dados['cond'] != "IN")))
               {
                   $dados['vls'] = array();
               }
               $this->Val_format_1 = $dados['vls'][0];
               if ($dados['cond'] == "BW")
               {
                   $this->Val_format_2 = $dados['vls'][1];
                   $this->Val_BW_2     = $dados['vls'][1];
               }
               $this->SC_proc_dyn_search_all($dados['cond'], $dados['vls'], "arc_codigo", 'N', 'INT', $Label_cmp);
           }
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_pesq_filtro'] = "( " . $this->Cmd_Dyn_Search . " )";
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_detal']) && !empty($this->Cmd_Dyn_Search)) 
       {
           $this->Cmd_Dyn_Search = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_detal'] . " and (" .  $this->Cmd_Dyn_Search . ")";
       }
       if (empty($this->Cmd_Dyn_Search)) 
       {
           $this->Cmd_Dyn_Search = " 1 <> 1 "; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_pesq_filtro'] = "( " . $this->Cmd_Dyn_Search . " )";
       }
       $sc_where = " where " . $this->Cmd_Dyn_Search;
       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_pesq'] = $sc_where;
       $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $rt = $this->Db->Execute($nmgp_select) ; 
       if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit ; 
       }  
       $qt_geral_reg_archivos = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['total'] = $qt_geral_reg_archivos;
       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['where_filter'] = $this->Cmd_Dyn_Search;
       $rt->Close(); 
       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_dyn_search'] . $this->Dyn_Serarch_and_or;
       if (NM_is_utf8($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_pesq']) && $_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_pesq'] = sc_convert_encoding($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_pesq'], $_SESSION['scriptcase']['charset'], "UTF-8");
       }
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          archivos_pack_ajax_response();
          exit;
      }
       $tmp = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_pesq'];
       $pos = strrpos($tmp, "##*@@");
       if ($pos !== false)
       {
           $and_or = (substr($tmp, ($pos + 5)) == "and") ? $this->Ini->Nm_lang['lang_srch_and_cond'] : $this->Ini->Nm_lang['lang_srch_orr_cond'];
           $tmp    = substr($tmp, 0, $pos);
           $this->Dyn_search_str = str_replace("##*@@", ", " . $and_or . " ", $tmp);
       }
       $this->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'] = NM_charset_to_utf8(trim($this->Dyn_search_str));
   }
   function SC_proc_dyn_search_lookup($cond, $vls, $sql, $tp, $tsql, $lab)
   {
       $nm_aspas = ($tp == 'A') ? "'" : "";
       $nm_cond = "";
       $nm_cmd  = "";
       foreach ($vls as $i => $dados)
       {
           $dados = NM_charset_decode($dados);
           if (!empty($nm_cond))
           {
               $nm_cmd .= ",";
               $nm_cond .= " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
           }
           $tmp_pos = strpos($dados, "##@@");
           if ($tmp_pos === false)
           {
              $res_lookup = $dados;
           }
           else
           {
               $res_lookup = substr($dados, $tmp_pos + 4);
               $dados = substr($dados, 0, $tmp_pos);
           }
           if (trim($dados) != "")
           {
               $nm_cmd .= $nm_aspas . $dados . $nm_aspas;
               $nm_cond .= $res_lookup;
           }
       }
       if (!empty($nm_cmd))
       {
           if (!empty($this->Cmd_Dyn_Search))
           {
               $this->Cmd_Dyn_Search .= " " . $this->Dyn_Serarch_and_or . " ";
           }
           if ($cond == "DF" || $cond == "NP")
           {
               $this->Cmd_Dyn_Search .= "(" . $sql . " not in (" . $nm_cmd . "))";
               $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_dyn_search'] .= $lab . " " . $this->Ini->Nm_lang['lang_srch_not_like'] . " " . $nm_cond . "##*@@";
           }
           else
           {
               $this->Cmd_Dyn_Search .= "(" . $sql . " in (" . $nm_cmd . "))";
               $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_dyn_search'] .= $lab . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
           }
       }
   }
   function SC_proc_dyn_search_all($cond, $vls, $sql, $tp, $tsql, $lab)
   {
       $nm_aspas  = "'";
       $nm_aspas1 = "'";
       if ($tp == "N" && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['decimal_db'] == ".")
       {
           $nm_aspas  = "";
           $nm_aspas1 = "";
       }
       if ($tp == "DT" || $tp == "DH" || $tp == "HH")
       {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['SC_sep_date']))
          {
              $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['SC_sep_date'];
              $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['SC_sep_date1'];
          }
      }
       $ini_lower = "";
       $end_lower = "";
       $nm_cond = "";
       $nm_cmd  = "";
       $dados   = $vls[0];
           if ($dados == "" && $cond != "NU" && $cond != "NN" && $cond != "EP" && $cond != "NE")
           {
               return;
           }
           if ($tp == 'N' && ($cond == "EP" || $cond == "NE"))
           {
               return;
           }
           $dados  = substr($this->Db->qstr($dados), 1, -1);
           if ($cond != "NU" && $cond != "NN" && $cond != "EP" && $cond != "NE")
           {
               if ($tsql == "TIMESTAMP")
               {
                   $tsql = "DATETIME";
               }
           }
           switch ($cond)
           {
              case "EQ":
                 $nm_cmd  = $nm_ini_lower . $sql . $nm_fim_lower . " = " . $nm_aspas . $dados . $nm_aspas1;
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "II":
                 $nm_cmd  = $nm_ini_lower . $sql . $nm_fim_lower . " like '" . $dados . "%'";
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "QP";
              case "NP";
                 $concat = " " . $this->Dyn_Serarch_and_or . " ";
                 if ($cond == "QP")
                 {
                     $op_all    = " like ";
                     $lang_like = $this->Ini->Nm_lang['lang_srch_like'];
                 }
                 else
                 {
                     $op_all    = " not like ";
                     $lang_like = $this->Ini->Nm_lang['lang_srch_not_like'];
                 }
                 $tmp_cond = "";
                 if (substr($tsql, 0, 4) == "DATE" && $this->Date_part)
                 {
                     if ($this->NM_data_qp['ano'] != "____")
                     {
                         $tmp_cond .= (empty($tmp_cond)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                         $tmp_cond .= $this->Ini->Nm_lang['lang_srch_year'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['ano'];
                         $nm_cmd   .= (empty($nm_cmd)) ? "" : $concat;
                         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                         {
                             $nm_cmd .= "strftime('%Y', " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                         }
                         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                         {
                             $nm_cmd .= "extract(year from " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                         }
                         else
                         {
                             $nm_cmd .= "year(" . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                         }
                     }
                     if ($this->NM_data_qp['mes'] != "__")
                     {
                         $tmp_cond .= (empty($tmp_cond)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                         $tmp_cond .= $this->Ini->Nm_lang['lang_srch_mnth'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['mes'];
                         $nm_cmd   .= (empty($nm_cmd)) ? "" : $concat;
                         $this->NM_data_qp['mes'] = (substr($this->NM_data_qp['mes'], 0, 1) == '0') ? substr($this->NM_data_qp['mes'], 1) : $this->NM_data_qp['mes'];
                         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                         {
                             $nm_cmd .= "strftime('%m', " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                         }
                         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                         {
                             $nm_cmd .= "extract(month from " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                         }
                         else
                         {
                             $nm_cmd .= "month(" . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                         }
                     }
                     if ($this->NM_data_qp['dia'] != "__")
                     {
                         $tmp_cond .= (empty($nm_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                         $tmp_cond .= $this->Ini->Nm_lang['lang_srch_days'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['dia'];
                         $nm_cmd  .= (empty($nm_cmd)) ? "" : $concat;
                         $this->NM_data_qp['dia'] = (substr($this->NM_data_qp['dia'], 0, 1) == '0') ? substr($this->NM_data_qp['dia'], 1) : $this->NM_data_qp['dia'];
                         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                         {
                             $nm_cmd .= "strftime('%d', " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                         }
                         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                         {
                             $nm_cmd .= "extract(day from " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                         }
                         else
                         {
                             $nm_cmd .= "day(" . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                         }
                     }
                 }
                 if (strpos($tsql, "TIME") !== false && $this->Date_part)
                 {
                     if ($this->NM_data_qp['hor'] != "__")
                     {
                         $tmp_cond .= (empty($tmp_cond)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                         $tmp_cond .= $this->Ini->Nm_lang['lang_srch_time'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['hor'];
                         $nm_cmd   .= (empty($nm_cmd)) ? "" : $concat;
                         $this->NM_data_qp['hor'] = (substr($this->NM_data_qp['hor'], 0, 1) == '0') ? substr($this->NM_data_qp['hor'], 1) : $this->NM_data_qp['hor'];
                         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                         {
                             $nm_cmd .= "strftime('%H', " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                         }
                         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                         {
                             $nm_cmd .= "extract(hour from " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                         }
                         else
                         {
                             $nm_cmd .= "hour(" . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                         }
                     }
                     if ($this->NM_data_qp['min'] != "__")
                     {
                         $tmp_cond .= (empty($tmp_cond)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                         $tmp_cond .= $this->Ini->Nm_lang['lang_srch_mint'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['min'];
                         $nm_cmd   .= (empty($nm_cmd)) ? "" : $concat;
                         $this->NM_data_qp['min'] = (substr($this->NM_data_qp['min'], 0, 1) == '0') ? substr($this->NM_data_qp['min'], 1) : $this->NM_data_qp['min'];
                         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                         {
                             $nm_cmd .= "strftime('%M', " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                         }
                         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                         {
                             $nm_cmd .= "extract(minute from " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                         }
                         else
                         {
                             $nm_cmd .= "minute(" . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                         }
                     }
                     if ($this->NM_data_qp['seg'] != "__")
                     {
                         $tmp_cond .= (empty($tmp_cond)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                         $tmp_cond .= $this->Ini->Nm_lang['lang_srch_scnd'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['seg'];
                         $nm_cmd   .= (empty($nm_cmd)) ? "" : $concat;
                         $this->NM_data_qp['seg'] = (substr($this->NM_data_qp['seg'], 0, 1) == '0') ? substr($this->NM_data_qp['seg'], 1) : $this->NM_data_qp['seg'];
                         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                         {
                             $nm_cmd .= "strftime('%S', " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                         }
                         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                         {
                             $nm_cmd .= "extract(second from " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                         }
                         else
                         {
                             $nm_cmd .= "second(" . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                         }
                     }
                 }
                 if (!$this->Date_part)
                 {
                     $nm_cmd  .= $nm_ini_lower . $sql . $nm_fim_lower . $op_all . "'%" . $dados . "%'";
                     $nm_cond  = $lab . " " . $lang_like . " " . $this->Val_format_1 . "##*@@";
                 }
                 else
                 {
                     if (!empty($tmp_cond))
                     {
                         $nm_cond = $lab . ": " . $tmp_cond . "##*@@";
                     }
                 }
              break;
              case "DF":
                 if ($tp == "DT" || $tp == "DH" || $tp == "HH")
                 {
                     $nm_cmd  = $nm_ini_lower . $sql . $nm_fim_lower . " not like '%" . $dados . "%'";
                 }
                 else
                 {
                     $nm_cmd  = $nm_ini_lower . $sql . $nm_fim_lower . " <> " . $nm_aspas . $dados . $nm_aspas1;
                 }
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "GT":
                 $nm_cmd  = $sql . " > " . $nm_aspas . $dados . $nm_aspas1;
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "GE":
                 $nm_cmd  = $sql . " >= " . $nm_aspas . $dados . $nm_aspas1;
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "LT":
                 $nm_cmd  = $sql . " < " . $nm_aspas . $dados . $nm_aspas1;
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "LE":
                 $nm_cmd  = $sql . " <= " . $nm_aspas . $dados . $nm_aspas1;
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "BW":
                 $this->Val_BW_2  = substr($this->Db->qstr($this->Val_BW_2), 1, -1);
                 $nm_cmd = $sql . " between " . $nm_aspas . $dados . $nm_aspas1 . " and " . $nm_aspas . $this->Val_BW_2 . $nm_aspas1;
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->Val_format_1 . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->Val_format_2 . "##*@@";
              break;
              case "IN":
                 $nm_sc_valores = explode(",", $dados);
                 $cond_str = "";
                 $nm_condX  = "";
                 $ini_mult  = "";
                 $end_mult  = "";
                 if (!empty($nm_sc_valores))
                 {
                     foreach ($nm_sc_valores as $nm_sc_valor)
                     {
                        if ($tp == "N" && substr_count($nm_sc_valor, ".") > 1)
                        {
                           $nm_sc_valor = str_replace(".", "", $nm_sc_valor);
                        }
                        if ("" != $cond_str)
                        {
                           $ini_mult  = "(";
                           $end_mult  = ")";
                           $cond_str .= ",";
                           $nm_condX  .= " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
                        }
                        $cond_str .= $nm_aspas . $nm_sc_valor . $nm_aspas1;
                        $nm_condX .= $nm_aspas . $nm_sc_valor . $nm_aspas1;
                     }
                     $nm_cmd  = $nm_ini_lower . $sql . $nm_fim_lower . " IN (" . $cond_str . ")";
                     $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $ini_mult . $nm_condX . $end_mult . "##*@@";
                 }
            break;
              case "NU":
                 $nm_cmd  = $sql . " IS NULL ";
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_null'] ."##*@@";
              break;
              case "NN":
                 $nm_cmd = $sql . " IS NOT NULL ";
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . "##*@@";
              break;
              case "EP":
                 $nm_cmd  = $sql . " = '' ";
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_empty'] ."##*@@";
              break;
              case "NE":
                 $nm_cmd = $sql . " <> '' ";
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_nempty'] . "##*@@";
              break;
           }
           if (!empty($nm_cmd))
           {
               if (!empty($this->Cmd_Dyn_Search))
               {
                   $this->Cmd_Dyn_Search .= " " . $this->Dyn_Serarch_and_or . " ";
               }
               $this->Cmd_Dyn_Search .= "(" . $nm_cmd . ")";
               $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['cond_dyn_search'] .= $nm_cond;
           }
   }

   function nm_prep_date(&$val, $tp, $tsql, &$cond, $format_nd)
   {
       if ($tsql == "TIMESTAMP")
       {
           $tsql = "DATETIME";
       }
       $cond = strtoupper($cond);
       if ($cond == "NU" || $cond == "NN" || $cond == "EP" || $cond == "NE")
       {
           $val    = array();
           $val[0] = "";
           return;
       }
       if ($cond == "BW")
       {
           $this->NM_data_1 = array();
           $this->NM_data_1['ano'] = (isset($val[0]['ano']) && !empty($val[0]['ano'])) ? $val[0]['ano'] : "____";
           $this->NM_data_1['mes'] = (isset($val[0]['mes']) && !empty($val[0]['mes'])) ? $val[0]['mes'] : "__";
           $this->NM_data_1['dia'] = (isset($val[0]['dia']) && !empty($val[0]['dia'])) ? $val[0]['dia'] : "__";
           $this->NM_data_1['hor'] = (isset($val[0]['hor']) && !empty($val[0]['hor'])) ? $val[0]['hor'] : "__";
           $this->NM_data_1['min'] = (isset($val[0]['min']) && !empty($val[0]['min'])) ? $val[0]['min'] : "__";
           $this->NM_data_1['seg'] = (isset($val[0]['seg']) && !empty($val[0]['seg'])) ? $val[0]['seg'] : "__";
           $this->data_menor($this->NM_data_1);
           $this->NM_data_2 = array();
           $this->NM_data_2['ano'] = (isset($val[1]['ano']) && !empty($val[1]['ano'])) ? $val[1]['ano'] : "____";
           $this->NM_data_2['mes'] = (isset($val[1]['mes']) && !empty($val[1]['mes'])) ? $val[1]['mes'] : "__";
           $this->NM_data_2['dia'] = (isset($val[1]['dia']) && !empty($val[1]['dia'])) ? $val[1]['dia'] : "__";
           $this->NM_data_2['hor'] = (isset($val[1]['hor']) && !empty($val[1]['hor'])) ? $val[1]['hor'] : "__";
           $this->NM_data_2['min'] = (isset($val[1]['min']) && !empty($val[1]['min'])) ? $val[1]['min'] : "__";
           $this->NM_data_2['seg'] = (isset($val[1]['seg']) && !empty($val[1]['seg'])) ? $val[1]['seg'] : "__";
           $this->data_maior($this->NM_data_2);
           $val = array();
           if ($tsql == "TIME")
           {
               $val[0] = $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
               $val[1] = $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
           }
           elseif (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] = $this->NM_data_1['ano'] . "-" . $this->NM_data_1['mes'] . "-" . $this->NM_data_1['dia'];
               $val[1] = $this->NM_data_2['ano'] . "-" . $this->NM_data_2['mes'] . "-" . $this->NM_data_2['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " " . $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
                   $val[1] .= " " . $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
               }
           }
           return;
       }
       $this->NM_data_qp = array();
       $this->NM_data_qp['ano'] = (isset($val[0]['ano']) && !empty($val[0]['ano'])) ? $val[0]['ano'] : "____";
       $this->NM_data_qp['mes'] = (isset($val[0]['mes']) && !empty($val[0]['mes'])) ? $val[0]['mes'] : "__";
       $this->NM_data_qp['dia'] = (isset($val[0]['dia']) && !empty($val[0]['dia'])) ? $val[0]['dia'] : "__";
       $this->NM_data_qp['hor'] = (isset($val[0]['hor']) && !empty($val[0]['hor'])) ? $val[0]['hor'] : "__";
       $this->NM_data_qp['min'] = (isset($val[0]['min']) && !empty($val[0]['min'])) ? $val[0]['min'] : "__";
       $this->NM_data_qp['seg'] = (isset($val[0]['seg']) && !empty($val[0]['seg'])) ? $val[0]['seg'] : "__";
       if ($tp != "ND" && ($cond == "LE" || $cond == "LT" || $cond == "GE" || $cond == "GT"))
       {
           $count_fill = 0;
           foreach ($this->NM_data_qp as $x => $tx)
           {
               if (substr($tx, 0, 2) != "__")
               {
                   $count_fill++;
               }
           }
           if ($count_fill > 1)
           {
               if ($cond == "LE" || $cond == "GT")
               {
                   $this->data_maior($this->NM_data_qp);
               }
               else
               {
                   $this->data_menor($this->NM_data_qp);
               }
               if ($tsql == "TIME")
               {
                   $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
               }
               elseif (substr($tsql, 0, 4) == "DATE")
               {
                   $val[0] = $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
                   if (strpos($tsql, "TIME") !== false)
                   {
                       $val[0] .= " " . $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
                   }
               }
               return;
           }
       }
       foreach ($this->NM_data_qp as $x => $tx)
       {
           if (substr($tx, 0, 2) == "__" && ($x == "dia" || $x == "mes" || $x == "ano"))
           {
               if (substr($tsql, 0, 4) == "DATE")
               {
                   $this->Date_part = true;
                   break;
               }
           }
           if (strpos($tsql, "TIME") !== false && ($tp == "DH" || ($tp == "DT" && $cond != "LE" && $cond != "LT" && $cond != "GE" && $cond != "GT")))
           {
               if (strpos($tsql, "TIME") !== false)
               {
                   $this->Date_part = true;
                   break;
               }
           }
       }
       if ($this->Date_part)
       {
           $this->Ini_date_part = "";
           $this->End_date_part = "";
           $this->Ini_date_char = "";
           $this->End_date_char = "";
           if ($tp != "ND")
           {
               if ($cond == "EQ")
               {
                   $this->Operador_date_part = " = ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
               }
               elseif ($cond == "II")
               {
                   $this->Operador_date_part = " like ";
                   $this->Ini_date_part = "'";
                   $this->End_date_part = "%'";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_strt'];
               }
               elseif ($cond == "DF")
               {
                   $this->Operador_date_part = " <> ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
               }
               elseif ($cond == "GT")
               {
                   $this->Operador_date_part = " > ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['pesq_cond_maior'];
               }
               elseif ($cond == "GE")
               {
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_grtr_equl'];
                   $this->Operador_date_part = " >= ";
               }
               elseif ($cond == "LT")
               {
                   $this->Operador_date_part = " < ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less'];
               }
               elseif ($cond == "LE")
               {
                   $this->Operador_date_part = " <= ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less_equl'];
               }
               elseif ($cond == "NP")
               {
                   $this->Operador_date_part = " not like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
               }
               else
               {
                   $this->Operador_date_part = " like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
               }
           }
           if ($cond == "DF")
           {
               $cond = "NP";
           }
           if ($cond != "NP")
           {
               $cond = "QP";
           }
       }
       $val = array();
       if ($tp != "ND" && ($cond == "QP" || $cond == "NP"))
       {
           $val[0] = "";
           if (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " ";
               }
           }
           if (strpos($tsql, "TIME") !== false)
           {
               $val[0] .= $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           }
           return;
       }
       if ($cond == "II" || $cond == "DF" || $cond == "EQ" || $cond == "LT" || $cond == "GE")
       {
           $this->data_menor($this->NM_data_qp);
       }
       else
       {
           $this->data_maior($this->NM_data_qp);
       }
       if ($tsql == "TIME")
       {
           $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           return;
       }
       $format_sql = "";
       if (substr($tsql, 0, 4) == "DATE")
       {
           $format_sql .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
           if (strpos($tsql, "TIME") !== false)
           {
               $format_sql .= " ";
           }
       }
       if (strpos($tsql, "TIME") !== false)
       {
           $format_sql .=  $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
       }
       if ($tp != "ND")
       {
           $val[0] = $format_sql;
           return;
       }
       if ($tp == "ND")
       {
           $format_nd = str_replace("yyyy", $this->NM_data_qp['ano'], $format_nd);
           $format_nd = str_replace("mm",   $this->NM_data_qp['mes'], $format_nd);
           $format_nd = str_replace("dd",   $this->NM_data_qp['dia'], $format_nd);
           $format_nd = str_replace("hh",   $this->NM_data_qp['hor'], $format_nd);
           $format_nd = str_replace("ii",   $this->NM_data_qp['min'], $format_nd);
           $format_nd = str_replace("ss",   $this->NM_data_qp['seg'], $format_nd);
           $val[0] = $format_nd;
           return;
       }
   }
   function data_menor(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "0001" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "01" : $data_arr["mes"];
       $data_arr["dia"] = ("__" == $data_arr["dia"])   ? "01" : $data_arr["dia"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "00" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "00" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "00" : $data_arr["seg"];
   }

   function data_maior(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "9999" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "12" : $data_arr["mes"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "23" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "59" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "59" : $data_arr["seg"];
       if ("__" == $data_arr["dia"])
       {
           $data_arr["dia"] = "31";
           if ($data_arr["mes"] == "04" || $data_arr["mes"] == "06" || $data_arr["mes"] == "09" || $data_arr["mes"] == "11")
           {
               $data_arr["dia"] = 30;
           }
           elseif ($data_arr["mes"] == "02")
           { 
                if  ($data_arr["ano"] % 4 == 0)
                {
                     $data_arr["dia"] = 29;
                }
                else 
                {
                     $data_arr["dia"] = 28;
                }
           }
       }
   }
   function dyn_convert_date($val)
   {
       $val_ok = array();
       foreach ($val as $Part_date)
       {
           if (substr($Part_date, 0, 1) == "Y")
           {
               $val_ok['ano'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "M")
           {
               $val_ok['mes'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "D")
           {
               $val_ok['dia'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "H")
           {
               $val_ok['hor'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "I")
           {
               $val_ok['min'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "S")
           {
               $val_ok['seg'] = substr($Part_date, 2);
           }
       }
       return $val_ok;
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
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_outra_jan'])
   {
       $nmgp_saida_form = "archivos_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['nm_run_menu'] = 2;
       $nmgp_saida_form = "archivos_fim.php";
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
       archivos_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['archivos']['masterValue']);
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
}
?>
