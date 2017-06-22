import { Component } from '@angular/core';
import { NavController, AlertController, LoadingController, Loading } from 'ionic-angular';
import { AuthService } from '../../providers/auth-service';
import { RegisterPage } from '../register/register';
import { HomePage } from '../home/home';
import { Storage } from '@ionic/storage';

@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})

export class LoginPage {
  loading: Loading;
  registerCredentials = { username: '', password: '' };
  private storage: Storage;

  constructor(
    private navCtrl: NavController,
    private auth: AuthService,
    private alertCtrl: AlertController,
    private loadingCtrl: LoadingController,
    storage: Storage
  ) {
    this.storage = storage;

  }
  // 
  //   setName() {
  //     this.storage.set('name', name);
  //   };
  // 
  //   getName() {
  //     this.storage.get('sessionid').then((sessionid) => {
  //       console.log('Your name is', sessionid);
  //     });
  //   };
  // 
  //   removeName() {
  //     this.storage.remove('name').then(() => {
  //       console.log('name has been removed');
  //     });
  //   }
  // 
  //   clearKeys() {
  //     this.storage.clear().then(() => {
  //       console.log('Keys have been cleared');
  //     });
  //   }

  public createAccount() {
    this.navCtrl.push(RegisterPage);
  }

  public login() {
    this.showLoading()
    this.auth.login(this.registerCredentials).subscribe(allowed => {
      if (allowed) {
        setTimeout(() => {
          this.loading.dismiss();
          this.navCtrl.setRoot(HomePage);
        });
      } else {
        this.showError("Access Denied");
      }
    },
      error => {
        this.showError(error);
      });
  }

  showLoading() {
    this.loading = this.loadingCtrl.create({
      content: 'Please wait...'
    });
    this.loading.present();
  }

  showError(text) {
    setTimeout(() => {
      this.loading.dismiss();
    });

    let alert = this.alertCtrl.create({
      title: 'Fail',
      subTitle: text,
      buttons: ['OK']
    });
    alert.present(prompt);
  }

}