import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { HomePage } from '../home/home';
import { SettingsPage } from '../settings/settings';
import { SearchPage } from '../search/search';
import { TagsPage } from '../tags/tags';
//import { AuthService } from '../../providers/auth-service';

/*
  Generated class for the Tabs page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
  selector: 'page-tabs',
  templateUrl: 'tabs.html'
})
export class TabsPage {

  // this tells the tabs component which Pages
  // should be each tab's root Page
  tab1Root: any = HomePage;
  tab2Root: any = SettingsPage;
  tab3Root: any = TagsPage;
  tab4Root: any = SearchPage;

  constructor(
    public navCtrl: NavController,
  ) { }

  ionViewDidLoad() {
    console.log('Hello TabsPage Page');
  }
}
