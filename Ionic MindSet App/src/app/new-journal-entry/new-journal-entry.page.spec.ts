import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NewJournalEntryPage } from './new-journal-entry.page';

describe('NewJournalEntryPage', () => {
  let component: NewJournalEntryPage;
  let fixture: ComponentFixture<NewJournalEntryPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NewJournalEntryPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NewJournalEntryPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
