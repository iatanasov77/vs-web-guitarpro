import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TracksItemComponent } from './tracks-item.component';

describe('TracksItemComponent', () => {
  let component: TracksItemComponent;
  let fixture: ComponentFixture<TracksItemComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TracksItemComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TracksItemComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
