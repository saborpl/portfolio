import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { TouchID } from 'ionic-native';
import { Platform } from 'ionic-angular';
import { AuthService } from '../../providers/auth-service';
import { LoginPage } from '../login/login';
/*
  Generated class for the Search page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({ selector: 'page-search', templateUrl: 'search.html' })
export class SearchPage {
  sessionid = '';
  username = '';
  isIos: boolean = false;
  info: string;

  constructor(
    public navCtrl: NavController,
    public platform: Platform,
    private auth: AuthService
  ) {

    let info = this.auth.getUserInfo();
    console.log(info.sessionid);
    this.sessionid = info.sessionid;
    this.username = info.username;

    this.isIos = platform.is('ios');
    this.platform = platform;

    if (this.isIos) {
      TouchID.isAvailable().then(res => console.log('TouchID is available!'), err => console.error('TouchID is not available', err));

      // TouchID  .verifyFingerprint('Scan your fingerprint please')  .then(res =>
      // console.log('Ok', res), err => console.error('Error', err));
      TouchID.verifyFingerprintWithCustomPasswordFallback("asasas").then(res => console.log('Ok', res), err => console.error('Error', err));
    }

  }

  ionViewDidLoad() {
    console.log('Hello SearchPage Page');
  }

  public logout() {
    this.auth.logout(this.sessionid).subscribe(succ => {
      this.navCtrl.setRoot(LoginPage)
    });
  }

}
