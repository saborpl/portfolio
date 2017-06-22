import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { App, ViewController } from 'ionic-angular';
import { PopoverTagPage } from '../../pages/popover-tag/popover-tag';

/*
  Generated class for the PopoverDay page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-popover-day',
  templateUrl: 'popover-day.html'
})
export class PopoverDayPage {
  days: number[] = [];
  date: any;
  constructor(
    public navCtrl: NavController,
    public viewCtrl: ViewController,
    public appCtrl: App
  ) {
    setTimeout(() => {
      for (var i = 1; i < 29; i++) {
        this.days.push(+i);
      }
      this.date = "1/5/16";
    }, 100);
  }

  ionViewDidLoad() {
    console.log('Hello PopoverDayPage Page');
  }

}
