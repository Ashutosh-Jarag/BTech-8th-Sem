import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms'; // Import FormsModule for ngModel

@Component({
  selector: 'app-root',
  standalone: false, // Using NgModule-based app (default for new projects)
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  todos: string[] = ['Learn Angular', 'Build a project']; // Initial to-do items
  newTodo: string = ''; // Bound to input field

  // Function to add a new to-do item
  addTodo() {
    if (this.newTodo.trim()) { // Check if input is not empty
      this.todos.push(this.newTodo.trim());
      this.newTodo = ''; // Clear the input
    }
  }
}