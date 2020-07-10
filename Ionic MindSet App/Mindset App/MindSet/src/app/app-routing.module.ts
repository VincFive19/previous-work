import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  //{ path: '', redirectTo: '/tabs/tab1', pathMatch: 'full'},
  { path: '', loadChildren: './tabs/tabs.module#TabsPageModule' },
  { path: 'guided-meditation', loadChildren: './guided-meditation/guided-meditation.module#GuidedMeditationPageModule' },
  { path: 'deep-breathing', loadChildren: './deep-breathing/deep-breathing.module#DeepBreathingPageModule' },
  { path: 'settings', loadChildren: './settings/settings.module#SettingsPageModule' },
  { path: 'tabs/tab1', loadChildren: './tab1/tab1.module#Tab1PageModule' },
  { path: 'tabs/tab2', loadChildren: './tab2/tab2.module#Tab2PageModule' },
  //{ path: 'modal-name', loadChildren: './modal-name/modal-name.module#ModalNamePageModule' },
  { path: 'new-journal-entry', loadChildren: './new-journal-entry/new-journal-entry.module#NewJournalEntryPageModule' },
  { path: 'old-journal-entry', loadChildren: './old-journal-entry/old-journal-entry.module#OldJournalEntryPageModule' },
  // { path: 'modal-email', loadChildren: './modal-email/modal-email.module#ModalEmailPageModule' },
  // { path: 'modal-psychologist-email', loadChildren: './modal-psychologist-email/modal-psychologist-email.module#ModalPsychologistEmailPageModule' }
];
@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule {}
