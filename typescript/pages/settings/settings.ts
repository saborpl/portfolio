import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

/*
  Generated class for the Settings page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-settings',
  templateUrl: 'settings.html'
})
export class SettingsPage {
  items = [];
  constructor(public navCtrl: NavController) {
    for (var i = 0; i < 30; i++) {
      this.items.push( this.items.length );
    }
  }

  ionViewDidLoad() {
    console.log('Hello SettingsPage Page');
  }

  doInfinite(infiniteScroll) {
    console.log('Begin async operation');

    setTimeout(() => {
      for (var i = 0; i < 30; i++) {
        this.items.push( this.items.length );
      }

      console.log('Async operation has ended');
      infiniteScroll.complete();
    }, 500);
  }  

}
