import { NgModule, ErrorHandler } from '@angular/core';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { TabsPage } from '../pages/tabs/tabs';
import { SettingsPage } from '../pages/settings/settings';
import { SearchPage } from '../pages/search/search';
import { TagsPage } from '../pages/tags/tags';
import { ProductionPage } from '../pages/production/production';
import { PlayerPage } from '../pages/player/player';
import { LoginPage } from '../pages/login/login';
import { AuthService } from '../providers/auth-service';
import { PropertyService } from '../providers/property-service';
import { RegisterPage } from '../pages/register/register';
import { Device } from 'ionic-native';
import { Storage } from '@ionic/storage';
import { PopoverScenePage } from '../pages/popover-scene/popover-scene';
import { PopoverDayPage } from '../pages/popover-day/popover-day';
import { PopoverRollPage } from '../pages/popover-roll/popover-roll';
import { PopoverTagPage } from '../pages/popover-tag/popover-tag';
import { PopoverSearchPage } from '../pages/popover-search/popover-search';
import { PopoverMetaPage } from '../pages/popover-meta/popover-meta';


@NgModule({
  declarations: [
    MyApp,
    HomePage,
    TabsPage,
    SettingsPage,
    SearchPage,
    TagsPage,
    ProductionPage,
    PlayerPage,
    HomePage,
    LoginPage,
    RegisterPage,
    PopoverScenePage,
    PopoverDayPage,
    PopoverRollPage,
    PopoverTagPage,
    PopoverSearchPage,
    PopoverMetaPage
  ],
  imports: [
    IonicModule.forRoot(MyApp)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    TabsPage,
    SettingsPage,
    SearchPage,
    TagsPage,
    ProductionPage,
    PlayerPage,
    HomePage,
    LoginPage,
    RegisterPage,
    PopoverScenePage,
    PopoverDayPage,
    PopoverRollPage,
    PopoverTagPage,
    PopoverSearchPage,
    PopoverMetaPage
  ],
  providers: [
    AuthService, Device, PropertyService, Storage, {
      provide: ErrorHandler, useClass: IonicErrorHandler,
    }
  ]
})

export class AppModule { }
