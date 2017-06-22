import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

/*
  Generated class for the PopoverMeta page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-popover-meta',
  templateUrl: 'popover-meta.html'
})
export class PopoverMetaPage {

  constructor(public navCtrl: NavController) {}

  ionViewDidLoad() {
    console.log('Hello PopoverMetaPage Page');
  }

}
