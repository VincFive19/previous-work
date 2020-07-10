import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { OldJournalEntryPage } from './old-journal-entry.page';

describe('OldJournalEntryPage', () => {
  let component: OldJournalEntryPage;
  let fixture: ComponentFixture<OldJournalEntryPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OldJournalEntryPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(OldJournalEntryPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
