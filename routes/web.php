<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**Route::get('/', function () {
return view('welcome');
});*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group([ 'middleware'=>'auth'], function () {
    /** Route cour gratuit */
    Route::get('/cours', 'PostController@index')->name('cours');
    Route::get('/cours/edit/{id}', 'PostController@edit')->name('cours.edit');
    Route::get('/cours/delete/{id}', 'PostController@destroy')->name('cours.delete');
    Route::get('/cours/create', 'PostController@create')->name('cours.create');
    Route::get('/cours/store', 'PostController@store')->name('cours.store');
    Route::post('/cours/update/{id}', 'PostController@update')->name('cours.update');
    Route::get('/supprimer_cours_video/{id_vid}', 'PostController@supprimer_video')->name('supprimer_cours_video');
    Route::get('/video_cours_update/{id}', 'PostController@ajouter_video')->name('video.update');

    //cours live
    Route::get('/cours_en_ligne', 'PostController@index2')->name('cours_en_ligne');
    Route::get('livecours', 'Postcontroller@live')->name('cours.livecours');
    Route::post('/cours/store_live', 'PostController@store_live')->name('cours.store_live');
    Route::get('/cours/live/delete/{id}', 'PostController@destroylive')->name('cours_en_ligne.delete');
    Route::get('/cours/live/edit/{id}', 'PostController@editlive')->name('cours_live.edit');
    Route::post('/cours/live/update/{id}', 'PostController@updatelive')->name('cours_live.update');
    /** Route cour payent */
    Route::get('/cours/create_payent', 'PostController@create_payent')->name('cours.create_payent');
    Route::get('/cours/store_payent', 'PostController@store_payent')->name('cours.store_payent');
    /** Route Packs */
    Route::get('/pack','PacksController@index')->name('pack');
    Route::get('/packs/create', 'PacksController@create')->name('pack.create_pack');
    Route::get('/packs/store', 'PacksController@store')->name('pack.store_pack');
    Route::get('/packs/delete/{id}', 'PacksController@destroy')->name('packs.delete');
    Route::get('/packs/update/{id}', 'PacksController@update')->name('pack.update');
    Route::get('/supprimer_video/{id_vid}', 'PacksController@supprimer_video')->name('supprimer_video');
    Route::get('/video_update/{id}', 'PacksController@ajouter_video')->name('video_pack.update');
    Route::get('/packs/edit/{id}', 'PacksController@edit')->name('packs.edit');
    /** Route categories */
    Route::get('/matieres', 'CategoriesController@index')->name('matieres');
    Route::get('/matieres/edit/{id}', 'CategoriesController@edit')->name('matieres.edit');
    Route::get('/matieres/delete/{id}', 'CategoriesController@destroy')->name('matieres.delete');
    Route::get('/matieres/create', 'CategoriesController@create')->name('matieres.create');
    Route::get('/matieres/store', 'CategoriesController@store')->name('matieres.store');
    Route::get('/matieres/update/{id}', 'CategoriesController@update')->name('matieres.update');

    //route for users
    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/users/admin/{id}', 'UsersController@admin')->name('users.admin')->middleware('admin');
    Route::get('/users/notadmin/{id}', 'UsersController@notAdmin')->name('users.not.admin');
    Route::get('/users/create', 'UsersController@create')->name('users.create');
    Route::post('/users/store', 'UsersController@store')->name('users.store');
    Route::get('/users/delete/{id}', 'UsersController@destroy')->name('users.delete');
    Route::get('users/{user_id}','EnseignantController@goprofil')->name('users.profil');
    Route::get('users/Updateuserprofil/{user_id}','EnseignantController@Updateuserprofil')->name('Updateuserprofil');
    Route::get('users/Updateuserpass/{user_id}','EnseignantController@Updateuserpass')->name('Updateuserpass');
    Route::post('profil/Updateuserimage/{Etu_id}','EnseignantController@Updateuserimage')->name('Updateuserimage');
    Route::get('message/{user_id}','EnseignantController@gomessage')->name('users.message');
    Route::get('users/{user_id}/message/{id}', 'EnseignantController@destroy')->name('message.delete');
    Route::get('users/{user_id}/sendmessage/{id}', 'EnseignantController@sendmessage')->name('send.message');
    Route::get('users/{user_id}/envoyer/{id}', 'EnseignantController@envoyer')->name('envoyer.message');
    //route setting
    Route::get('/settings', 'SettingsControler@index')->name('settings');
    Route::get('/settings/update', 'SettingsControler@update')->name('settings.update');
    Route::get('/lesVirement', 'UsersController@Virement')->name('payement.virement');
    Route::get('/Consulter_virement/{etud_id}/{pai_id}', 'UsersController@Consulter')->name('Consulter_virement');
    Route::get('/valider_virement/{etud_id}/{pai_id}', 'UsersController@valider')->name('valider_virement');
    Route::get('/Annuler_virement/{pai_id}', 'UsersController@Annuler')->name('Annuler_virement');
});
//route Enseignant
Route::get('/demande_enseigants', 'EnseignantController@index')->name('demande_enseigants');
Route::get('/demande_enseigants/Denseigant', 'EnseignantController@create')->name('demande_enseigants.Denseigant');
Route::get('/demande_enseigants/Plusinfo/{id}', 'EnseignantController@Plusinfo')->name('demande_enseigants.Plusinfo');
Route::post('/demande_enseigants/store', 'EnseignantController@store')->name('demande_enseigants.store');
Route::get('/demande_enseigants/Nven', 'EnseignantController@Nven')->name('demande_enseigants.Nvens');
Route::get('/emails/email/{id}', 'UsersController@accepter')->name('emails.email');
Route::get('/demande_enseigants/rufse/{id}', 'UsersController@rufse')->name('demande_enseigants.rufse');
Route::get('/pdf/{id}', 'EnseignantController@pdf')->name('download');




//route Etudiant
Route::get('/etudiant','UsersController@indexetudiant')->name('etud');
Route::get('logins', 'Auth\LoginController@logins')->name('Etudiant.LoginEtudiant');
Route::post('logins', 'Auth\loginController@Etudiantlogin')->name('Etudiant.login');
Route::get('logouts', 'Auth\loginController@logouts')->name('Etudiant.logout');
Route::get('register', 'EtudiantController@create')->name('Etudiant.registeretudiant');
Route::post('register', 'EtudiantController@store')->name('Etudiant.register');
Route::get('request', 'EtudiantController@request')->name('Etudiant.request');
Route::post('request', 'EtudiantController@send_mail')->name('mot_de_passe.email');
Route::get('Etudiant.réinitialisation', 'EtudiantController@reinitialisation')->name('Etudiant.réinitialisation');
Route::post('password_etud.update', 'EtudiantController@password_etud_update')->name('password_etud.update');
Route::get('profil/{Etu_id}','EtudiantController@goprofil')->name('Etudiant.profil');
Route::get('profil/Updateprofil/{Etu_id}','EtudiantController@Updateprofil')->name('Updateprofil');
Route::get('profil/Updatepass/{Etu_id}','EtudiantController@Updatepass')->name('Updatepass');
Route::post('profil/Updateimage/{Etu_id}','EtudiantController@Updateimage')->name('Updateimage');
Route::get('Mes_cours/{Etu_id}','EtudiantController@Mes_cours')->name('Etudiant.Mes_cours');
Route::get('/etudiant/delete/{id}', 'EtudiantController@destroy')->name('etudiant.delete');
//route WebSite
//route pageindex
Route::get('/', 'siteUIcontroller@index')->name('index');
//route pageMatiere
Route::get('/matiere/{matiere_id}', 'siteUIcontroller@matiere')->name('WebSite.matiere');
//route pageContact
Route::get('Contact', 'siteUIcontroller@Contact')->name('WebSite.contact');
//route live
Route::get('live', 'siteUIcontroller@live')->name('WebSite.live');

//route Etudiant Send message to user
Route::get('Message', 'EtudiantController@Message')->name('Message.etudiant');
//route pageManuel
Route::get('Manuel', 'siteUIcontroller@utilisation')->name('utilisation');
//route Les packs
Route::get('Packs', 'siteUIcontroller@pack')->name('packs');
//route payement
Route::get('creat/code', 'EtudiantController@index_code')->name('payement.code');
Route::post('code/envoyer/{id}', 'EtudiantController@code')->name('payement.envoyer');
Route::get('acheter_cour/{id_etud}/{id_cour}', 'EtudiantController@acheter')->name('acheter_cour');
Route::get('detaille_cours/{id_cour}', 'EtudiantController@detaille')->name('detaille_cours');
Route::get('acheter_pack/{id_etud}/{id_pack}', 'EtudiantController@acheter_pack')->name('acheter_pack');
Route::get('detaille_pack/{id_pack}', 'EtudiantController@detaille_pack')->name('detaille_pack');
